<h1>Liste des clients</h1>

<a href="<?= BASE_URL ?>/clients/create-form">Ajouter un client</a>

<table>
    <tr>
        <th>Nom</th>
        <th>Email</th>
        <th>Tel</th>
        <th>Statut</th>
        <th>Actions</th>
    </tr>

    <?php foreach($clients as $c) : ?>
        <tr>
            <td><?= htmlspecialchars($c["nom"]) ?></td>
            <td><?= htmlspecialchars($c["email"]) ?></td>
            <td><?= htmlspecialchars($c["tel"]) ?></td>
            <td><?= htmlspecialchars($c["statut"]) ?></td>
            <td><a href="<?= BASE_URL ?>/clients/show?id=<?= $c['id'] ?>">Voir</a></td>
        </tr>
    <?php endforeach; ?>    
</table>