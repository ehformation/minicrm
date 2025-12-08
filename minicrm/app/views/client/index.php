<h1>Liste des clients</h1>

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
            <td></td>
        </tr>
    <?php endforeach; ?>    
</table>