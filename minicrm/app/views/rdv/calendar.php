<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">

    <h1 class="text-3xl font-bold mb-6 text-center">
        Calendrier des RDV — <?= date("F Y") ?>
    </h1>

    <div class="grid grid-cols-7 text-center font-semibold border-b pb-2">
        <div>Lun</div>
        <div>Mar</div>
        <div>Mer</div>
        <div>Jeu</div>
        <div>Ven</div>
        <div>Sam</div>
        <div>Dim</div>
    </div>

    <div class="grid grid-cols-7 gap-2 mt-4">

        <?php for ($i = 1; $i < $startWeekDay; $i++): ?>
            <div class="h-24 border rounded bg-gray-50"></div>
        <?php endfor; ?>
            
        <?php for ($day = 1; $day <= $daysInMonth; $day++): 
            $dateStr = "$year-$month-" . str_pad($day, 2, "0", STR_PAD_LEFT);
            $hasRdv = isset($rdvs[$dateStr]);
        ?>

        <div class="h-32 border rounded p-1 overflow-y-auto <?= $hasRdv ? 'bg-gray-200' : 'bg-white' ?>">
            
            <div class="text-sm font-semibold mb-1"><?= $day ?></div>

            <?php if ($hasRdv): ?>
                <?php foreach ($rdvs[$dateStr] as $r): ?>
                    <div class="bg-black text-white text-xs p-1 rounded mb-1">
                        <span><?= $r['heure'] ?></span> — 
                        <span><?= $r['client_nom'] ?></span>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>

        <?php endfor; ?>
    </div>

</div>