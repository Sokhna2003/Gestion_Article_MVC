<section class="p-8">
  <div class="flex justify-between items-center mb-8">
    <div>
      <h2 class="text-2xl font-bold text-gray-800">Liste des Articles</h2>
      <p class="text-sm text-gray-500 mt-1">
        Total en base de données : <span class="font-bold text-[#00A8CC]"><?= $total_articles ?></span> article(s)
      </p>
    </div>
    <div class="flex space-x-3">
      <button class="px-4 py-2 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50 flex items-center font-semibold text-sm transition text-gray-600">
          <i class="fa-solid fa-filter mr-2 text-gray-400"></i> Filtrer par catégorie
      </button>
      <a href="<?= path("article", "ajout") ?>" class="px-4 py-2 bg-[#00A8CC] text-white rounded-lg shadow-md hover:bg-[#0092B0] transition font-semibold text-sm flex items-center">
        <i class="fa-solid fa-plus mr-2"></i> Créer un article
      </a>
    </div>
  </div>

  <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
      <thead class="bg-gray-50 border-b border-gray-100">
        <tr>
          <th class="p-4 text-gray-500 font-semibold uppercase text-xs tracking-wider">Libellé</th>
          <th class="p-4 text-gray-500 font-semibold uppercase text-xs tracking-wider">Catégorie</th>
          <th class="p-4 text-gray-500 font-semibold uppercase text-xs tracking-wider">Aperçu du contenu</th>
          <th class="p-4 text-gray-500 font-semibold uppercase text-xs tracking-wider">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-50">
        <?php if (empty($articles)): ?>
          <tr>
            <td colspan="4" class="p-12 text-center text-gray-400">
              <i class="fa-regular fa-folder-open text-4xl mb-3 block text-gray-300"></i>
              Aucun article enregistré pour le moment.
            </td>
          </tr>
        <?php else: ?>
          <?php foreach ($articles as $article): ?>
          <tr class="hover:bg-gray-50/50 transition">
            <!-- Libellé -->
            <td class="p-4 font-bold text-gray-700"><?= htmlspecialchars($article["libelle"]) ?></td>
            
            <td class="p-4">
              <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-50 text-blue-600 border border-blue-100">
                <?= htmlspecialchars($article["categorie"]) ?>
              </span>
            </td>
            
            <td class="p-4 text-gray-500 text-sm max-w-xs truncate" title="<?= htmlspecialchars($article["contenu"]) ?>">
              <?= htmlspecialchars($article["contenu"]) ?>
            </td>
            
            <td class="p-4">
              <div class="flex items-center space-x-4">
                <a href="<?= path("article", "detail") ?>&id=<?= $article["id_article"] ?>" class="text-blue-500 hover:text-blue-700 transition" title="Voir les détails">
                    <i class="fa-solid fa-eye text-lg"></i>
                </a>
                
                <a href="<?= path("article", "supprimer") ?>&id=<?= $article["id_article"] ?>" 
                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');" 
                   class="text-red-400 hover:text-red-600 transition" title="Supprimer l'article">
                    <i class="fa-solid fa-trash-can text-lg"></i>
                </a>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</section>
