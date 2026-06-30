<section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 mb-12">
  <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
    
    <div class="p-6 sm:p-8 bg-gray-50 border-b border-gray-100">
      <div class="flex flex-wrap items-center justify-between gap-4 mb-4">
        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-50 text-blue-600 border border-blue-100 uppercase tracking-wider">
          <i class="fa-solid fa-tag mr-1"></i> <?= htmlspecialchars($article['categorie']) ?>
        </span>
        
        <div class="text-xs text-gray-400 flex items-center bg-white px-3 py-1 rounded-full border border-gray-100 shadow-sm">
          <i class="fa-solid fa-clock mr-1.5 text-gray-300"></i>
          Publié le : <strong class="text-gray-500 ml-1"><?= htmlspecialchars(date('d/m/Y à H:i', strtotime($article['created_at'] ?? 'now'))) ?></strong>
        </div>
      </div>
      
      <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight">
        <?= htmlspecialchars($article['libelle']) ?>
      </h1>
    </div>
    
    <div class="p-6 sm:p-8">
      <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4 border-b border-gray-50 pb-2">
        Contenu de la publication
      </h3>
      
      <p class="text-gray-700 text-base leading-relaxed bg-gray-50/50 p-6 rounded-xl border border-gray-100 whitespace-pre-line shadow-inner font-normal">
        <?= htmlspecialchars($article['contenu']) ?>
      </p>
    </div>

    <div class="px-6 py-4 sm:px-8 bg-gray-50 border-t border-gray-100 flex flex-col sm:flex-row justify-between items-center gap-3">
      <!-- Lien de retour principal -->
      <a href="<?= path("article", "liste") ?>" 
         class="w-full sm:w-auto px-5 py-2.5 bg-white border border-gray-300 hover:bg-gray-100 text-gray-700 rounded-lg text-sm font-semibold transition-all shadow-sm flex items-center justify-center">
        <i class="fa-solid fa-arrow-left-long mr-2 text-gray-400"></i> Retour à la liste
      </a>
      
      <a href="<?= path("article", "supprimer") ?>&id=<?= $article['id_article'] ?>" 
         onclick="return confirm('Êtes-vous sûr de vouloir supprimer définitivement cet article ?');" 
         class="w-full sm:w-auto px-5 py-2.5 bg-red-50 hover:bg-red-100 border border-red-200 text-red-600 rounded-lg text-sm font-semibold transition-all flex items-center justify-center">
        <i class="fa-solid fa-trash-can mr-2"></i> Supprimer l'article
      </a>
    </div>

  </div>
</section>
