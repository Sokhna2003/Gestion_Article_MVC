<section class="p-8 space-y-8">
    <div>
        <h2 class="text-3xl font-bold text-gray-800">Tableau de Bord</h2>
        <p class="text-sm text-gray-500 mt-1">Vue d'ensemble de votre productivité et de vos objectifs.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 flex items-center justify-between">
            <div class="space-y-1">
                <span class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Total Tâches</span>
                <h3 class="text-3xl font-bold text-gray-700"><?= $total ?></h3>
            </div>
            <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center text-xl">
                <i class="fa-solid fa-folder-tree"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 flex items-center justify-between">
            <div class="space-y-1">
                <span class="text-sm font-semibold text-gray-400 uppercase tracking-wider">En Cours</span>
                <h3 class="text-3xl font-bold text-amber-600"><?= $enCours ?></h3>
            </div>
            <div class="w-12 h-12 bg-amber-50 text-amber-500 rounded-full flex items-center justify-center text-xl">
                <i class="fa-solid fa-spinner fa-spin"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 flex items-center justify-between">
            <div class="space-y-1">
                <span class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Terminées</span>
                <h3 class="text-3xl font-bold text-green-600"><?= $terminer ?></h3>
            </div>
            <div class="w-12 h-12 bg-green-50 text-green-500 rounded-full flex items-center justify-center text-xl">
                <i class="fa-solid fa-circle-check"></i>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 space-y-4">
        <div class="flex justify-between items-center">
            <h4 class="font-bold text-gray-700">Progression globale de vos objectifs</h4>
            <span class="text-sm font-bold text-blue-600 bg-blue-50 px-2.5 py-1 rounded-full"><?= $pourcentage ?>% Réussi</span>
        </div>
        <div class="w-full bg-gray-100 rounded-full h-4 overflow-hidden">
            <div class="bg-[#00A8CC] h-4 rounded-full transition-all duration-500" style="width: <?= $pourcentage ?>%"></div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-50 flex justify-between items-center">
            <h4 class="font-bold text-gray-700">Tâches récemment ajoutées</h4>
            <a href="<?= path("tache","liste") ?>" class="text-xs font-semibold text-[#00A8CC] hover:text-[#0092B0] transition">Voir tout →</a>
        </div>
        <div class="divide-y divide-gray-50">
            <?php if(empty($recentTaches)): ?>
                <p class="p-6 text-center text-sm text-gray-400">Aucune activité récente.</p>
            <?php else: ?>
                <?php foreach($recentTaches as $tache): ?>
                    <div class="p-4 flex items-center justify-between hover:bg-gray-50/50 transition">
                        <div class="flex items-center space-x-4">
                            <span class="w-2.5 h-2.5 rounded-full <?= $tache['statut'] === 'Terminee' ? 'bg-green-500' : 'bg-amber-500' ?>"></span>
                            <div>
                                <p class="text-sm font-bold text-gray-700"><?= htmlspecialchars($tache['libelle']) ?></p>
                                <p class="text-xs text-gray-400">Échéance : <?= htmlspecialchars($tache['date_fin']) ?></p>
                            </div>
                        </div>
                        <a href="<?= path("tache","detail") ?>&id=<?= $tache['id_tache'] ?>" class="text-gray-400 hover:text-blue-500 transition">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
