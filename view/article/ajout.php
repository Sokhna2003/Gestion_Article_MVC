<section class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 mb-12">
  <div class="bg-white p-8 rounded-xl shadow-md border border-gray-100">
    <div class="mb-6 text-center">
      <h2 class="text-2xl font-bold text-gray-800">Créer un Nouvel Article</h2>
      <p class="text-sm text-gray-500 mt-1">Veuillez remplir tous les champs obligatoires marqués d'une étoile.</p>
    </div>
    
    <form action="<?= path("article", "ajout") ?>" method="POST" class="space-y-5">

      <div>
        <label for="libelle" class="block text-sm font-semibold text-gray-700 mb-1">
          Libellé de l'article <span class="text-red-500">*</span>
        </label>
        <input type="text" name="libelle" id="libelle" placeholder="Ex: Les bases de la programmation"
          value="<?= htmlspecialchars($_POST['libelle'] ?? '') ?>"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#00A8CC] focus:border-[#00A8CC] outline-none transition-all text-sm">
        <?php if (isset($errors["libelle"])): ?>
          <span class="text-red-600 text-xs mt-1 block font-medium"><i class="fa-solid fa-circle-exclamation mr-1"></i> <?= $errors["libelle"] ?></span>
        <?php endif; ?>
      </div>

    <div>
      <label for="id_categorie" class="block text-sm font-semibold text-gray-700 mb-1">
        Catégorie <span class="text-red-500">*</span>
      </label>
      <div class="relative">
        <select name="id_categorie" id="id_categorie" 
          class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-[#00A8CC] outline-none appearance-none text-sm text-gray-700">
            <option value="" disabled <?= !isset($_POST['id_categorie']) ? 'selected' : '' ?>>-- Sélectionner une catégorie --</option>
            
            <!-- Changement ici : $cat est maintenant un tableau contenant id_categorie et nom_categorie -->
            <?php foreach ($categories as $cat): ?>
              <option value="<?= $cat['id_categorie'] ?>" <?= (isset($_POST['id_categorie']) && (int)$_POST['id_categorie'] === (int)$cat['id_categorie']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($cat['nom_categorie']) ?>
              </option>
            <?php endforeach; ?>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
          <i class="fa-solid fa-chevron-down text-xs"></i>
        </div>
      </div>
      <?php if (isset($errors["id_categorie"])): ?>
        <span class="text-red-600 text-xs mt-1 block font-medium"><i class="fa-solid fa-circle-exclamation mr-1"></i> <?= $errors["id_categorie"] ?></span>
      <?php endif; ?>
    </div>


      <div>
          <label for="contenu" class="block text-sm font-semibold text-gray-700 mb-1">
            Contenu de l'article <span class="text-red-500">*</span>
          </label>
          <textarea name="contenu" id="contenu" rows="6" placeholder="Rédigez le texte de votre article ici..." 
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#00A8CC] focus:border-[#00A8CC] outline-none resize-none transition-all text-sm"><?= htmlspecialchars($_POST['contenu'] ?? '') ?></textarea>
          <?php if (isset($errors["contenu"])): ?>
            <span class="text-red-600 text-xs mt-1 block font-medium"><i class="fa-solid fa-circle-exclamation mr-1"></i> <?= $errors["contenu"] ?></span>
          <?php endif; ?>
      </div>
        
      <input type="hidden" name="controller" value="article">
      <input type="hidden" name="action" value="ajout">

      <div class="pt-4 flex flex-col sm:flex-row-reverse gap-3">
        <button type="submit" name="ajout" value="add_article" 
          class="w-full sm:w-1/2 bg-[#00A8CC] hover:bg-[#0092B0] text-white font-bold py-2.5 px-4 rounded-lg shadow-md transition-colors text-sm flex items-center justify-center">
          <i class="fa-solid fa-floppy-disk mr-2"></i> Enregistrer l'article
        </button>
        <a href="<?= path("article", "liste") ?>" 
          class="w-full sm:w-1/2 border border-gray-300 hover:bg-gray-50 text-gray-600 font-semibold py-2.5 px-4 rounded-lg text-sm transition-colors flex items-center justify-center">
          Annuler
        </a>
      </div>
    </form>
  </div>
</section>
