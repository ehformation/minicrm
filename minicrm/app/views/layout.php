<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= STYLE_URL ?>/custom.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <nav class="bg-white shadow mb-6">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center h-16">

            <div class="text-xl font-bold text-blue-600">
                <a href="<?= $helpers->url("/clients") ?>">MiniCRM</a>
            </div>

            <div class="flex items-center space-x-6">
                <a href="<?= $helpers->url("/clients") ?>" class="text-gray-700 hover:text-blue-600 font-medium">Clients</a>

                <a href="<?= $helpers->url("/clients/create-form") ?>"
                class="px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    ➕ Nouveau client
                </a>
            </div>

        </div>
    </nav>
    <div class="max-w-4xl mx-auto mt-4">
        <?php $helpers->displayNotification(); ?>
    </div>
    <?php require $viewFile; ?>
    <footer class="mt-10 py-4 bg-blue-50 border-t border-blue-200 text-center text-blue-700 text-sm">
        <p>© <?= date('Y') ?> MiniCRM — Gestion simplifiée des clients</p>
    </footer>


</body>
</html>

