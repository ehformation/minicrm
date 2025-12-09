<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6">➕ Ajouter un client</h1>

    <form action="<?= BASE_URL ?>/clients/store" method="POST" class="space-y-4">

        <div>
            <label class="block text-gray-700 font-medium">Nom</label>
            <input type="text" name="nom"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Email</label>
            <input type="email" name="email"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Téléphone</label>
            <input type="text" name="tel"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Statut</label>
            <select name="statut"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
                <option>Nouveau</option>
                <option>En discussion</option>
                <option>Devis envoyé</option>
                <option>En attente</option>
                <option>Projet en cours</option>
                <option>En pause</option>
                <option>Terminé</option>
                <option>Annulé</option>
            </select>
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Notes internes</label>
            <textarea name="notes"
                      class="w-full border border-gray-300 rounded-lg px-3 py-2 h-24 focus:ring focus:ring-blue-200"></textarea>
        </div>

        <button
            class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
            Enregistrer
        </button>

    </form>
</div>
