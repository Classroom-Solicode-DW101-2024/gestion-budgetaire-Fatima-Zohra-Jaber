<?php

    require '../config.php';
    require '../controllers/dashboard.php';

    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit;
    }

    $user = $_SESSION['user'];

    $total = totalCurrentMonth($conn);
    $lastTotal = totalLastMonth($conn);
    $max = maxCurrentMonth($conn);

    $typeSelected = $_POST['type'] ?? 'revenu';


    
    $categories = listCategories($typeSelected, $conn);

    $result;

    if (isset($_POST['afficher']) && isset($_POST['categorie'])) {
        $categorieId = $_POST['categorie'];
    
        if ($typeSelected === 'revenu') {
            $result = totalIncomesByCategory($categorieId, $conn);
        } else {
            $result = totalExpensesByCategory($categorieId, $conn);
        }
    }
    

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen font-sans">
    <?php  require '../header.php'; ?>
<div class="flex flex-wrap justify-center gap-10 py-6 px-10 ">
  <!-- Total Balance -->
  <div class="bg-white rounded-xl shadow-md p-6 w-70">
    <h2 class="text-sm font-semibold text-gray-500">Solde Total</h2>
    <p class="text-3xl font-bold text-blue-900 mt-2"><?= number_format(soldUser($conn), 2) ?> Dh </p>
  </div>

  <!-- Total Period Income -->
  <div class="bg-white rounded-xl shadow-md p-6 w-70">
    <h2 class="text-sm font-semibold text-gray-500">Total des revenus de la période</h2>
    <p class="text-3xl font-bold text-blue-900 mt-2"><?= number_format($total['revenu'], 2) ?> Dh</p>
    <?php 
        if ($total['revenu'] != 0) {
            $perRevenu = number_format(($total['revenu'] - $lastTotal['revenu']) / $total['revenu'] * 100, 2);
        } else {
            $perRevenu = 0; 
        }
        if($perRevenu < 0):
    ?>
    <div class="flex items-center text-sm text-red-500 mt-4 border-t-2 pt-2">
    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path fill-rule="evenodd"
            d="M12 13a1 1 0 100 2h5a1 1 0 001-1V9a1 1 0 10-2 0v2.586l-4.293-4.293a1 1 0 00-1.414 0L8 9.586 3.707 5.293a1 1 0 00-1.414 1.414l5 5a1 1 0 001.414 0L11 9.414 14.586 13H12z"
            clip-rule="evenodd"></path>
    </svg>
    <?= abs($perRevenu) ?>%
    <?php else: ?>  
    <div class="flex items-center text-sm text-green-500 mt-4 border-t-2 pt-2">
    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
        aria-hidden="true">
        <path fill-rule="evenodd"
            d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z"
            clip-rule="evenodd"></path>
    </svg>
        <?= $perRevenu ?>%
    <?php endif; ?>
      <span class="ml-2 text-gray-400">Last month <span class="font-medium"><?= number_format($lastTotal['revenu'], 2) ?> Dh </span></span>
    </div>
  </div>

  <!-- Total Period Expenses -->
  <div class="bg-white rounded-xl shadow-md p-6 w-70">
    <h2 class="text-sm font-semibold text-gray-500">Total des dépenses de la période</h2>
    <p class="text-3xl font-bold text-blue-900 mt-2"><?= number_format($total['depense'], 2) ?> Dh</p>
    <?php
    if ($total['depense'] != 0) {
        $perDepense = number_format(($total['depense'] - $lastTotal['depense']) / $total['depense'] * 100, 2);
    } else {
        $perDepense = 0; 
    }
    if($perDepense < 0):
    ?>
    <div class="flex items-center text-sm text-green-500 mt-4 border-t-2 pt-2">
    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
        aria-hidden="true">
        <path fill-rule="evenodd"
            d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z"
            clip-rule="evenodd"></path>
    </svg>
        <?= abs($perDepense) ?>%
    <?php else: ?>
    <div class="flex items-center text-sm text-red-500 mt-4 border-t-2 pt-2">
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd"
                d="M12 13a1 1 0 100 2h5a1 1 0 001-1V9a1 1 0 10-2 0v2.586l-4.293-4.293a1 1 0 00-1.414 0L8 9.586 3.707 5.293a1 1 0 00-1.414 1.414l5 5a1 1 0 001.414 0L11 9.414 14.586 13H12z"
                clip-rule="evenodd"></path>
        </svg>
        <?= $perDepense ?>%
    <?php endif; ?>
      <span class="ml-2 text-gray-400">Last month <span class="font-medium"><?= number_format($lastTotal['depense'], 2) ?> Dh</span></span>
    </div>
  </div>

  <!-- Max -->
  <div class="bg-white rounded-xl shadow-md p-6 w-70">
    <h2 class="text-sm font-semibold text-gray-500">Le revenu le plus grand</h2>
    <div class="flex items-center text-sm font-semibold text-green-500 pb-3 mt-1 border-b-2">
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
            aria-hidden="true">
            <path fill-rule="evenodd"
                d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z"
                clip-rule="evenodd"></path>
        </svg>
        <?= number_format($max['revenu'], 2) ?> Dh
    </div>
    <h2 class="text-sm font-semibold text-gray-500 mt-3">La dépense la plus haute</h2>
    <div class="flex items-center text-sm font-semibold text-red-500 mt-1">
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
            aria-hidden="true">
            <path fill-rule="evenodd"
                d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z"
                clip-rule="evenodd"></path>
        </svg>
        <?= number_format($max['depense'], 2) ?> Dh
    </div>
  </div>
</div>


<div class="max-w-6xl mx-auto mb-4 py-6 px-10 bg-white rounded-xl shadow-md">
    <h3 class="text-xl font-semibold mb-4 text-primary border-b pb-2">Filtrer par catégorie</h3>
    <form method="POST" class="flex flex-wrap gap-10 mx-3">
        <div class="mb-6">
            <p class="text-sm font-medium mb-3 text-gray-600">Type de transaction:</p>
            <div class="inline-flex border border-primary rounded-full overflow-hidden text-sm">
                <label class="px-6 py-2 font-medium cursor-pointer transition-colors <?= $typeSelected === 'revenu' ? 'bg-blue-500 text-white' : 'hover:bg-blue-100' ?>">
                    <input type="radio" name="type" value="revenu" onchange="this.form.submit()" class="hidden" <?= $typeSelected === 'revenu' ? 'checked' : '' ?>> Revenu
                </label>
                <label class="px-6 py-2 font-medium cursor-pointer transition-colors <?= $typeSelected === 'depense' ? 'bg-blue-500 text-white' : 'hover:bg-blue-100' ?>">
                    <input type="radio" name="type" value="depense" onchange="this.form.submit()" class="hidden" <?= $typeSelected === 'depense' ? 'checked' : '' ?>> Dépense
                </label>
            </div>
        </div>
            <div class="flex-grow">
                <label for="categorie" class="block text-sm font-medium mb-2 text-gray-600">Catégorie :</label>
                <select name="categorie" id="categorie" class="w-full border-2 border-gray-200 p-2 rounded-lg transition-all min-w-[150px]">
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat['id'] ?>" <?= (isset($_POST['categorie']) && $_POST['categorie'] == $cat['id']) ? 'selected' : '' ?>>
                            <?= $cat['nom'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <button type="submit" name="afficher" class="px-4 py-2 bg-blue-500 text-white hover:bg-yellow-400 font-medium rounded-lg transition-colors shadow-md flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                Afficher
            </button>
        
    </form>

    <div class="mt-2 p-6 bg-gray-50 rounded-lg border border-gray-100">
        <h3 class="text-lg font-semibold text-primary mb-3">Total par catégorie</h3>
        <p class="text-3xl font-bold text-primary"><?= number_format($result ?? 0, 2) ?> <span class="text-sm font-normal text-gray-500">Dh</span></p>
    </div>
  
</div>
</body>
</html>
