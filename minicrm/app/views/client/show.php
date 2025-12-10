<div class="max-w-3xl mx-auto">

    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <h1 class="text-3xl font-bold mb-2"><?= $client['nom'] ?></h1>

        <p class="text-gray-600"><strong>Email :</strong> <?= $client['email'] ?></p>
        <p class="text-gray-600"><strong>Téléphone :</strong> <?= $client['tel'] ?></p>

        <p class="mt-3">
            <strong>Statut :</strong>
            <span class="px-3 py-1 rounded text-sm
                <?php
                echo match($client['statut']) {
                    'Nouveau' => 'bg-blue-100 text-blue-800',
                    'En discussion' => 'bg-purple-100 text-purple-800',
                    'Devis envoyé' => 'bg-yellow-100 text-yellow-800',
                    'En attente' => 'bg-orange-100 text-orange-800',
                    'Projet en cours' => 'bg-green-100 text-green-800',
                    'En pause' => 'bg-gray-200 text-gray-800',
                    'Terminé' => 'bg-green-200 text-green-900',
                    'Annulé' => 'bg-red-200 text-red-800',
                    default => 'bg-gray-100 text-gray-700'
                };
                ?>">
                <?= $client['statut'] ?>
            </span>
        </p>
    </div>

    <!-- Timeline de note  -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <h2 class="text-2xl font-semibold mb-4">🕓 Timeline / Notes</h2>

        <?php if (count($notes) === 0): ?>
            <p class="text-gray-500">Aucune note pour ce client.</p>
        <?php else : ?>
            <ul class="space-y-3">
                <?php foreach ($notes as $note): ?>
                    <li class="bg-gray-50 p-4 rounded border border-gray-200">
                        <div class="text-sm text-gray-500 mb-1">
                            <?= $note['created_at'] ?>
                        </div>
                        <div class="text-gray-700">
                            <?= htmlspecialchars($note['contenu']) ?>
                        </div>
                        <div class="text-sm text-red-500 mb-1">
                           <a onclick="return confirm('Supprimer la note de ce client ? Cette action est irréversible.');" href="<?= url("/notes/delete?id=" . $note['id'] . "&client_id=" . $client['id']) ?>">Supprimer</a> 
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif;?>

    </div>

    <!-- Ajout de note  -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-semibold mb-4">➕ Ajouter une note</h3>

        <form action="<?= url("/notes/store") ?>" method="POST" class="space-y-4">
            <input type="hidden" name="client_id" value="<?= $client['id'] ?>">

            <textarea name="contenu"
                      class="w-full border border-gray-300 rounded-lg px-3 py-2 h-24 focus:ring focus:ring-blue-200"></textarea>

            <button
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Ajouter
            </button>
        </form>
    </div>

    <!-- Affichage des rendez vous -->
                    
    
    <!-- Ajout des rendez vous -->

    <div class="mt-6">
        <a href="/clients" class="text-blue-600 underline hover:text-blue-800">← Retour à la liste</a>
    </div>

</div>
