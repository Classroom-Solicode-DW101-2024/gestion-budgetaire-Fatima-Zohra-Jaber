<?php
    session_start();
    
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    try{
        $conn = new PDO("mysql:host=localhost;dbname=gestion_budget", "root", 'root');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e){
        die ("Connexion échouée: " . $e->getMessage());
    }
    
    
    // Chargement de la table categories

    $categories = [
        'revenu' => ['Salaire', 'Bourse', 'Ventes', 'Autres'],
        'depense' => ['Logement', 'Transport', 'Alimentation', 'Santé', 'Divertissement', 'Éducation', 'Autres']
    ];
    
    foreach ($categories as $type => $noms) {
        foreach ($noms as $nom) {
            $stmt = $conn->prepare("SELECT COUNT(*) FROM categories WHERE nom = ? AND type = ?");
            $stmt->execute([$nom, $type]);
            $count = $stmt->fetchColumn();
    
            if ($count == 0) {
                $insert = $conn->prepare("INSERT INTO categories (nom, type) VALUES (?, ?)");
                $insert->execute([$nom, $type]);
            }
        }
    }
    function listCategories($type, $connection) {
        $query = "SELECT * FROM categories WHERE type= :type";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':type', $type, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

   
    ?>    