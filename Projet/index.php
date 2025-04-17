<?php 
    require_once 'config.php';
    require_once 'transactions.php';

    
    if(isset($_POST['add'])){
        $transaction['user_id'] = $_SESSION['user']['id'];
        $transaction['category_id'] = $_POST['categoryId'];
        $transaction['montant'] = trim(htmlspecialchars($_POST['montant']));
        $transaction['description'] = trim(htmlspecialchars($_POST['description']));
        $transaction['date_transaction'] = $_POST['date_transaction'];
        addTransaction($transaction,$conn);
    }
    if(isset($_POST['delete'])){
        $idTransaction = 
        deleteTransaction($idTransaction,$conn);
    }
    if(isset($_POST['edit'])){
        
        editTransaction($idTransaction,$newTransaction,$conn);
    }
    if(isset($_POST['list'])){
        
        listTransactions($conn);
    }
    if(isset($_POST['listMonth'])){
        
        listTransactionsbyMonth($conn,$year,$month);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion budgétaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="bg-blue-500 text-white p-4">
        <h1 class="text-2xl font-bold">Welcome to Your Budget Management System</h1>
        <nav >
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="transactions.php">Transactions</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Manage Your Budget Effectively</h2>
        <p>Use our system to track your expenses and income.</p>
        <p><a href="register.php">Register</a> to get started!</p>
        <p>If you already have an account, <a href="login.php">Login</a> to access your dashboard.</p>
        <p>Check your <a href="transactions.php">transactions</a> to see your financial history.</p>
        <form method="POST">
            <input type="submit" value="Ajouter" name="add">
            <input type="submit" value="Supprimer" name="delete">
            <input type="submit" value="Modifier" name="edit">
            <input type="submit" value="List Transactions" name="list">
            <input type="submit" value="List Transactions par mois" name="listMonth">
        </form>
    </main>
    <footer class="bg-blue-500 text-white p-4">
        <p>&copy; 2023 Your Budget Management System</p>
        <p><a href="privacy.php">Privacy Policy</a></p>
        <p><a href="terms.php">Terms of Service</a></p>
        <p><a href="contact.php">Contact Us</a></p>
    </footer>

</body>
</html>