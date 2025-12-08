<h1>Ajouter un Client</h1>

<form action="" method="POST">
    Nom: <input type="text" name="nom"><br><br>
    Email: <input type="email" name="email"><br><br>
    Téléphone: <input type="text" name="tel"><br><br>

    Statut :
    <select name="statut">
        <option>Nouveau</option>
        <option>En discussion</option>
        <option>Devis envoyé</option>
        <option>En attente</option>
        <option>Projet en cours</option>
        <option>En pause</option>
        <option>Terminé</option>
        <option>Annulé</option>
    </select>

    <br><br>

    Notes internes :  
    <textarea name="notes"></textarea>

    <br><br>

    <button type="submit">Enregistrer</button>
</form>
