<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Articles</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
      @theme {
        --color-clifford: #da373d;
      }
    </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

  <div class="flex h-screen">
    
    <aside class="w-1/5 bg-[#1E272E] text-white flex flex-col p-6 space-y-8">
      <a href="<?= path("article","liste") ?>" class="text-2xl font-bold text-[#00A8CC] flex items-center"> 
        <i class="fa-solid fa-newspaper mr-3"></i>Gestion Article
      </a>
      
      <nav class="space-y-2">
        <div class="flex items-center p-3 rounded-lg hover:bg-white/10 cursor-pointer transition <?= ($_GET['action'] ?? 'liste') === 'liste' ? 'bg-[#00A8CC]/20 border-l-4 border-[#00A8CC]' : '' ?>">
          <a href="<?= path("article","liste") ?>" class="flex items-center space-x-3 w-full">
            <i class="fa-solid fa-table-list w-6 text-xl"></i> 
            <span class="font-medium">Tous les Articles</span>
          </a>
        </div>

        <div class="flex items-center p-3 rounded-lg hover:bg-white/10 cursor-pointer transition <?= ($_GET['action'] ?? '') === 'ajout' ? 'bg-[#00A8CC]/20 border-l-4 border-[#00A8CC]' : '' ?>">
          <a href="<?= path("article","ajout") ?>" class="flex items-center space-x-3 w-full">
            <i class="fa-solid fa-circle-plus w-6 text-xl"></i> 
            <span class="font-medium">Nouvel Article</span>
          </a>
        </div>      
      </nav>
    </aside>
    
    <main class="flex-1 flex flex-col overflow-hidden">
      
      <header class="h-20 bg-white shadow-sm flex items-center justify-between px-8 border-b border-gray-100">
        <h2 class="text-xl font-semibold text-gray-700">Espace Administration</h2>
        
        <div class="flex items-center space-x-6 w-1/2 justify-end">
          <div class="relative w-2/3">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
            <input type="text" placeholder="Rechercher un article..." 
            class="w-full pl-10 pr-4 py-2 bg-gray-50 rounded-full border border-gray-200 focus:ring-2 focus:ring-[#00A8CC] focus:bg-white outline-none transition-all text-sm">
          </div>
        </div>
      </header>
            
      <div class="flex-1 overflow-y-auto bg-gray-50/50">
          <?= $content ?>
      </div>

    </main>
  </div>

</body>
</html>
