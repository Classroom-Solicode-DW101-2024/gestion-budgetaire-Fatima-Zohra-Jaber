<?php

require '../config.php';
require '../controllers/transactions.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$transactions = listTransactions($conn);

$categoriesRevenu = listCategories('revenu', $conn);
$categoriesDepense = listCategories('depense', $conn);

$typeSelected = 'revenu';

if (isset($_POST['search'])) {
    $year = date('Y', strtotime($_POST['periode']));
    $month = date('m', strtotime($_POST['periode']));
    $transactions = listTransactionsbyMonth($conn, $year, $month);
} else {
    $transactions = listTransactions($conn);
}

if (isset($_POST['add'])) {
    $transaction['montant'] = $_POST['montant'];
    $transaction['description'] = $_POST['description'];
    $transaction['date'] = $_POST['date'];
    $transaction['category_id'] = $_POST['category_id'];
    addTransaction($transaction, $conn);
}

if (isset($_POST['edit'])) {
    $idTransaction = $_POST['transaction_id'];
    $newTransaction['montant'] = $_POST['montant'];
    $newTransaction['description'] = $_POST['description'];
    $newTransaction['date'] = $_POST['date'];
    $newTransaction['category_id'] = $_POST['category_id'];
    editTransaction($idTransaction, $newTransaction, $conn);
}
if (isset($_POST['delete'])) {
    $idTransaction = $_POST['transaction_id'];
    deleteTransaction($idTransaction, $conn);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Transactions</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-50 min-h-screen font-sans">
    <?php require '../header.php'; ?>

    <div class="max-w-6xl mx-auto px-4 py-10">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">💸 Historique des Transactions</h1>
  
        <!-- Search and Add Transaction -->
            <form method="POST" class="w-full flex justify-between items-center gap-4 mb-6">
                <div class="w-full flex w-1/4 md:w-1/3 gap-2">
                   <input type="month" name="periode" id="periode"
                        class="w-1/3 md:w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:outline-none focus:ring focus:ring-blue-300"
                        value="<?= $_POST['periode'] ?? date('Y-m') ?>">
                
                    <button type="submit" name="search"
                        class="text-sm md:text-lg bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition">
                        Rechercher
                    </button>
                </div>
           
                <button onclick='openAddEditModal("add")'
                    class=" text-sm md:text-lg bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition">
                    + Ajouter
                </button>
            </form>
        <?php if (count($transactions) == 0): ?>
            <p class="text-lg text-center text-gray-600">Vous n’avez aucune transaction.</p>
        <?php else: ?>
            <!-- Transactions Table -->
            <div class="overflow-x-auto bg-white rounded-lg shadow">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="px-4 py-2 text-left">Date</th>
                            <th class="px-4 py-2 text-left">Catégorie</th>
                            <th class="px-4 py-2 text-left">Description</th>
                            <th class="px-4 py-2 text-left">Montant</th>
                            <th class="px-4 py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm">
                        <?php foreach ($transactions as $transaction): ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left"><?= htmlspecialchars($transaction['date_transaction']) ?></td>
                                <td class="py-3 px-6 text-left"><?= htmlspecialchars($transaction['nom']) ?></td>
                                <td class="py-3 px-6 text-left"><?= htmlspecialchars($transaction['description']) ?></td>
                                <?php if ($transaction['type'] === "revenu"): ?>
                                    <td class="py-3 px-6 text-left text-green-500"><?= number_format($transaction['montant'], 2) ?></td>
                                <?php else: ?>
                                    <td class="py-3 px-6 text-left text-red-500">-<?= number_format($transaction['montant'], 2) ?></td>
                                <?php endif; ?>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex item-center justify-center">
                                        <button onclick='openAddEditModal("edit", <?= json_encode($transaction, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>)' class="w-4 transform hover:text-blue-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </button>
                                        <button onclick="openDeleteModal(<?= $transaction['id'] ?>)"
                                            class="w-4 transform hover:text-red-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif ?>

        <!-- Modal Ajouter / Modifier -->
        <div id="addEditModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 hidden">
            <div class="bg-white rounded-lg w-full max-w-md p-6">
                <h2 class="text-xl font-semibold mb-4" id="titre"></h2>
                <form action="" method="POST" class="space-y-2">

                    <input type="hidden" name="transaction_id" id="transaction_id">
                    <div id="type-switch" class="inline-flex border border-primary rounded-full overflow-hidden text-sm">
                        <label class="px-6 py-2 font-medium cursor-pointer transition-colors" data-type="revenu">
                            <input type="radio" name="type" value="revenu" class="hidden"> Revenu
                        </label>
                        <label class="px-6 py-2 font-medium cursor-pointer transition-colors" data-type="depense">
                            <input type="radio" name="type" value="depense" class="hidden"> Dépense
                        </label>
                    </div>

                    <label for="category_id" class="block text-sm font-medium text-gray-600">Catégorie :</label>
                    <select name="category_id" id="category_id" class="w-full border p-2 rounded ">

                    </select>
                    
                    <label for="montant" class="block text-sm font-medium text-gray-600">Montant :</label>
                    <input type="number" name="montant" id="montant" class="w-full border p-2 rounded">
                    <label for="description" class="block text-sm font-medium text-gray-600">Description :</label>
                    <textarea name="description" id="description" class="w-full border p-2 rounded" rows="2"></textarea>     
                    <label for="date" class="block text-sm font-medium text-gray-600">Date :</label>
                    <input type="date" name="date" id="date" required class="w-full border p-2 rounded">

                    <div class="flex justify-end space-x-2 pt-4">
                        <button type="button" onclick="closeModal('addEditModal')" class="px-4 py-2 text-gray-500 hover:text-red-500">Annuler</button>
                        <button type="submit" id="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"></button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Supprimer -->
        <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 hidden">
            <div class="bg-white rounded-lg w-full max-w-md p-6">
                <h2 class="text-xl font-semibold mb-4 text-red-600">Confirmer la suppression</h2>
                <p>Êtes-vous sûr de vouloir supprimer cette transaction ?</p>
                <form method="POST" class="flex justify-end pt-4 space-x-2">
                    <input type="hidden" name="transaction_id" id="delete_id">
                    <button onclick="closeModal('deleteModal')" class="px-4 py-2 text-gray-600 hover:text-red-500">Annuler</button>
                    <button type="submit" name="delete" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Supprimer</button>
                </form>
            </div>
        </div>
        <?php $categoriesRevenu = listCategories('revenu', $conn);
              $categoriesDepense = listCategories('depense', $conn); ?>

        <script>

            function openAddEditModal(action, transaction) {
                if (action === "add") {
                    document.getElementById('titre').innerText = "Ajouter la transaction";
                    document.getElementById('montant').value = '';
                    document.getElementById('description').value = '';
                    document.getElementById('date').value = '';
                    document.getElementById('category_id').value = '';
                    document.getElementById('submit').innerText = "Ajouter";
                    document.getElementById('submit').setAttribute('name', 'add'); 

                } else if (action === "edit") {
                    document.getElementById('titre').innerText = "Modifier la transaction";
                    document.getElementById('montant').value = transaction.montant;
                    document.getElementById('description').value = transaction.description;
                    document.getElementById('date').value = transaction.date_transaction;
                    document.getElementById('category_id').value = transaction.category_id; 
                    document.getElementById('transaction_id').value = transaction.id;
                    document.querySelector(`input[name="type"][value="${transaction.type}"]`).checked = true;
                    document.getElementById('submit').innerText = "Modifier";
                    document.getElementById('submit').setAttribute('name', 'edit');
                }
                document.getElementById('addEditModal').classList.remove("hidden");

            }

            function openDeleteModal(idTransaction) {
                console.log("Suppression ID :", idTransaction);
                document.getElementById('delete_id').value = idTransaction;
                document.getElementById('deleteModal').classList.remove("hidden");
            }

            function closeModal(id) {
                document.getElementById(id).classList.add("hidden");
            }

    const categoriesRevenu = <?= json_encode($categoriesRevenu) ?>;
    const categoriesDepense = <?= json_encode($categoriesDepense) ?>;

    console.log(categoriesRevenu);
    console.log(categoriesDepense);

    
    function updateCategory(type) {
        const categorySelect = document.getElementById('category_id');
        categorySelect.innerHTML = '<option value="">Sélectionnez une catégorie</option>';

        const categories = type === 'revenu' ? categoriesRevenu : categoriesDepense;

        categories.forEach(cat => {
            const option = document.createElement('option');
            option.value = cat.id;
            option.textContent = cat.nom;
            categorySelect.appendChild(option);
        });
    }

   
    document.querySelectorAll('#type-switch input[name="type"]').forEach(radio => {
        radio.addEventListener('change', function () {
            const selectedType = this.value;
            updateCategory(selectedType);

            document.querySelectorAll('#type-switch label').forEach((label) => {
            const isChecked = label.querySelector('input').checked;
            label.classList.toggle('bg-blue-500', isChecked);
            label.classList.toggle('text-white', isChecked);
            label.classList.toggle('hover:bg-blue-100', !isChecked);
        });
            
        });
    });

  
    const selectedRadio = document.querySelector('input[name="type"]:checked');
    if (selectedRadio) {
        updateCategory(selectedRadio.value);
    }


</script>


</body>

</html>