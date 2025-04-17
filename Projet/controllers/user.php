<?php 
function addUser($user,$connection) {
    // Vérifier si l'adresse e-mail est déjà utilisée
    $stmt = $connection->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $user['email'], PDO::PARAM_STR);
    $stmt->execute();  
    if ($stmt->rowCount() > 0) {
        return "email";
    }

    // Insérer le nouvel utilisateur dans BDD
    $sql = "INSERT INTO users (`nom`, `email`, `password`) VALUES (:name, :email, :password)";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':name', $user['name']);
    $stmt->bindParam(':email', $user['email']);
    $stmt->bindValue(':password', password_hash($user['password'], PASSWORD_BCRYPT));//PASSWORD_DEFAULT
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        return true;
    } else {
        return "global";
    }
    // return $connection->lastInsertId(); retourner l'ID de l'utilisateur nouvellement créé
}

function logUser($email,$password,$connection) { 
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['password'])) {
        return $user; 
    } else {
        return false;
    }
}

function detailsUser($connection) {
    $query = "SELECT * FROM users WHERE idUser = :idUser";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':idUser', $_SESSION['idUser'], PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC); 
}