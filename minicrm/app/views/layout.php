<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <nav class="bg-white shadow mb-6">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center h-16">

            <div class="text-xl font-bold text-blue-600">
                MiniCRM
            </div>

            <div class="flex items-center space-x-6">
                <a href="<?= BASE_URL ?>/clients" class="text-gray-700 hover:text-blue-600 font-medium">Clients</a>

                <a href="<?= BASE_URL ?>/clients/create-form"
                class="px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    ➕ Nouveau client
                </a>
            </div>

        </div>
    </nav>
    <?php require $view; ?>
    <footer class="mt-10 py-4 bg-blue-50 border-t border-blue-200 text-center text-blue-700 text-sm">
        <p>© <?= date('Y') ?> MiniCRM — Gestion simplifiée des clients</p>
    </footer>


</body>
</html>

