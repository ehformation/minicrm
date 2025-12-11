
<h1 class="text-3xl font-bold mb-6">📋 Liste des clients</h1>

<div class="mb-6">
    <a href="<?= $helpers->url("/clients/create-form") ?>"
    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
        ➕ Ajouter un client
    </a>
</div>

<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
        <thead>
        <tr class="bg-gray-100 border-b">
            <th class="text-left px-4 py-3 font-medium text-gray-600">Nom</th>
            <th class="text-left px-4 py-3 font-medium text-gray-600">Email</th>
            <th class="text-left px-4 py-3 font-medium text-gray-600">Téléphone</th>
            <th class="text-left px-4 py-3 font-medium text-gray-600">Statut</th>
            <th class="text-left px-4 py-3 font-medium text-gray-600">Actions</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($clients as $c): ?>
            <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-3"><?= htmlspecialchars($c['nom']) ?></td>
                <td class="px-4 py-3"><?= htmlspecialchars($c['email']) ?></td>
                <td class="px-4 py-3"><?= htmlspecialchars($c['tel']) ?></td>
                <td class="px-4 py-3">
                    <span class="px-2 py-1 rounded text-sm
                        <?php
                        echo match($c['statut']) {
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
                        <?= $c['statut'] ?>
                    </span>
                </td>
                <td class="px-4 py-3">
                    <a href="<?= $helpers->url("/clients/show?id=" . $c['id']); ?>"
                    class="text-blue-600 hover:text-blue-800 underline">
                        Voir →
                    </a><br>
                    <a href="<?= $helpers->url("/clients/edit-form?id=" . $c['id']); ?>"
                    class="text-yellow-600 hover:text-yellow-800 underline">
                        Modifier →
                    </a><br>
                    <a href="<?= $helpers->url("/clients/delete?id=" . $c['id']); ?>"
                    onclick="return confirm('Supprimer ce client ? Cette action est irréversible.');" class="text-red-600 hover:text-red-800 underline">
                        Supprimer
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>

    </table>
</div>

