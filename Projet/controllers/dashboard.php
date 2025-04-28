<?php 

function soldUser($connection) {
    if (!isset($_SESSION['user']['id'])) {
        return 0; 
    }
    $query = "SELECT SUM(t.montant) AS total, c.type FROM transactions t JOIN categories c
              ON t.category_id = c.id WHERE t.user_id = :userId GROUP BY c.type;";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':userId', $_SESSION['user']['id'], PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total = ['revenu' => 0, 'depense' => 0];

    foreach ($result as $row) {
        if ($row['type'] === 'revenu' || $row['type'] === 'depense') {
            $total[$row['type']] = (float) $row['total'];
        }
    }

    $solde = $total['revenu'] - $total['depense'];
    return $solde;
    
}

function totalCurrentMonth($connection) {
    $query = "SELECT SUM(t.montant) AS total, c.type FROM transactions t JOIN categories c
              ON t.category_id = c.id WHERE t.user_id = :userId
              AND MONTH(t.date_transaction) = MONTH(CURRENT_DATE)
              AND YEAR(t.date_transaction) = YEAR(CURRENT_DATE)
              GROUP BY c.type";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':userId', $_SESSION['user']['id'], PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total = ['revenu' => 0, 'depense' => 0];

    foreach ($result as $row) {
        if ($row['type'] === 'revenu' || $row['type'] === 'depense') {
            $total[$row['type']] = (float) $row['total'];
        }
    }

    return $total;   
}   

function totalLastMonth($connection) {
    $query = "SELECT SUM(t.montant) AS total, c.type FROM transactions t JOIN categories c
              ON t.category_id = c.id WHERE t.user_id = :userId
              AND MONTH(t.date_transaction) = MONTH(CURRENT_DATE) - 1
              AND YEAR(t.date_transaction) = YEAR(CURRENT_DATE)
              GROUP BY c.type";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':userId', $_SESSION['user']['id'], PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total = ['revenu' => 0, 'depense' => 0];

    foreach ($result as $row) {
        if ($row['type'] === 'revenu' || $row['type'] === 'depense') {
            $total[$row['type']] = (float) $row['total'];
        }
    }

    return $total;   
}



function totalIncomesByCategory($category,$connection) {
    $query = "SELECT SUM(t.montant) AS total FROM transactions t JOIN categories c
              ON t.category_id = c.id WHERE type = 'revenu' AND category_id = :categoryId 
              AND t.user_id = :userId";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':categoryId', $category, PDO::PARAM_STR);
    $stmt->bindParam(':userId', $_SESSION['user']['id'], PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        return $result['total']; 
    }else {
        return 0; 
    }
}
function totalExpensesByCategory($category,$connection) {
    $query = "SELECT SUM(t.montant) AS total FROM transactions t JOIN categories c
              ON t.category_id = c.id WHERE type = 'depense' AND category_id = :categoryId 
              AND t.user_id = :userId";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':categoryId', $category, PDO::PARAM_STR);
    $stmt->bindParam(':userId', $_SESSION['user']['id'], PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        return $result['total']; 
    }else {
        return 0; 
    }
}
function maxCurrentMonth($connection) {
    $query = "SELECT MAX(t.montant) AS total, c.type FROM transactions t JOIN categories c
              ON t.category_id = c.id WHERE t.user_id = :userId
              AND MONTH(t.date_transaction) = MONTH(CURRENT_DATE)
              AND YEAR(t.date_transaction) = YEAR(CURRENT_DATE)
              GROUP BY c.type";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':userId', $_SESSION['user']['id'], PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $max = ['revenu' => 0, 'depense' => 0];

    foreach ($result as $row) {
        if ($row['type'] === 'revenu' || $row['type'] === 'depense') {
            $max[$row['type']] = (float) $row['total'];
        }
    }

    return $max;   
}  