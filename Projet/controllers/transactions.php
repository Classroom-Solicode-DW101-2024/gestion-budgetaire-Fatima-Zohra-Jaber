<?php

function addTransaction($transaction,$connection) {
    $sql = "INSERT INTO transactions (user_id, category_id, montant, description, date_transaction )
            VALUES (:userId, :categoryId, :montant , :description, :date)";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':userId',  $_SESSION['user']['id'], PDO::PARAM_INT);
    $stmt->bindParam(':categoryId', $transaction['category_id'], PDO::PARAM_INT);
    $stmt->bindParam(':montant', $transaction['montant'], PDO::PARAM_INT);
    $stmt->bindParam(':description', $transaction['description'], PDO::PARAM_STR);
    $stmt->bindParam(':date', $transaction['date'], PDO::PARAM_STR);
    $stmt->execute();
    return $connection->lastInsertId(); 

}
function deleteTransaction($idTransaction,$connection) {
    $query = "DELETE FROM transactions WHERE id = :idTransaction";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':idTransaction', $idTransaction, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount() > 0; 
}

function editTransaction($idTransaction,$newTransaction,$connection) {
    $sql = "UPDATE transactions SET  category_id = :categoryId, montant = :montant, description = :description,
    date_transaction = :date WHERE id = :idTransaction";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':idTransaction', $idTransaction, PDO::PARAM_INT);
    $stmt->bindParam(':categoryId', $newTransaction['category_id'], PDO::PARAM_INT);
    $stmt->bindParam(':montant', $newTransaction['montant'], PDO::PARAM_INT);
    $stmt->bindParam(':description', $newTransaction['description'], PDO::PARAM_STR);
    $stmt->bindParam(':date', $newTransaction['date'], PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->rowCount() > 0; // Return true if a row was updated, false otherwise
}
function listTransactions($connection) {
    $query = "SELECT t.id, t.montant, t.description, t.date_transaction, c.nom ,c.type
              FROM transactions t JOIN categories c ON t.category_id = c.id 
              WHERE t.user_id = :userId ORDER BY date_transaction DESC";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':userId', $_SESSION['user']['id'], PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function listTransactionsbyMonth($connection,$year,$month) {
    $query = "SELECT t.id, t.montant, t.description, t.date_transaction, c.nom ,c.type
              FROM transactions t JOIN categories c ON t.category_id = c.id 
              WHERE t.user_id = :userId AND YEAR(date_transaction) = :year 
              AND MONTH(date_transaction) = :month ORDER BY date_transaction DESC";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':userId', $_SESSION['user']['id'], PDO::PARAM_INT);
    $stmt->bindParam(':year', $year, PDO::PARAM_INT);
    $stmt->bindParam(':month', $month, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
}