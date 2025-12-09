<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6">✏️ Modifier le client</h1>

    <form action="<?= url("/clients/update") ?>" method="POST" class="space-y-4">

        <input type="hidden" name="client_id" value="<?= $client['id'] ?>">

        <div>
            <label class="block text-gray-700 font-medium">Nom</label>
            <input type="text" name="nom" value="<?= $client['nom'] ?>"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2">
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Email</label>
            <input type="email" name="email" value="<?= $client['email'] ?>"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2">
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Téléphone</label>
            <input type="text" name="tel" value="<?= $client['tel'] ?>"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2">
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Statut</label>
            <select name="statut"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2">
                <?php 
                $statuts = [
                    "Nouveau", "En discussion", "Devis envoyé", "En attente",
                    "Projet en cours", "En pause", "Terminé", "Annulé"
                ];
                foreach ($statuts as $s): ?>
                    <option <?= $client['statut']==$s?'selected':'' ?>>
                        <?= $s ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Notes internes</label>
            <textarea name="notes"
                      class="w-full border border-gray-300 rounded-lg px-3 py-2 h-24"><?= $client['notes'] ?></textarea>
        </div>

        <button
            class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
            Enregistrer les modifications
        </button>

    </form>

    <div class="mt-4">
        <a href="<?= url("/clients") ?>" class="text-blue-600 underline">
            ← Retour
        </a>
    </div>
</div>
