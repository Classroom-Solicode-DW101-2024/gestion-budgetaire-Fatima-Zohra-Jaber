<?php

    require '../config.php';
    require '../controllers/user.php';
    
    $erreur = [];

    if(isset($_POST['login'])){
        
        if(empty($_POST['email'])){
            $erreur['email'] = "Veuillez entrer votre adresse email";
        }elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $erreur['email'] = "Veuillez entrer une adresse email valide";
        }
        if(empty($_POST['password'])){
            $erreur['password'] = "Veuillez entrer votre mot de passe";
        }
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $email = trim(htmlspecialchars($_POST['email']));
            $password = trim($_POST['password']);
            $user = logUser($email,$password,$conn);
            if($user){
                $_SESSION['user'] = $user;
                header("Location:dashboard.php");
                exit;
            }else{
                $erreur['password'] = "Email ou Mot de passe non valide!";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-lg w-96">
        <h2 class="text-2xl font-semibold mb-4">Connexion</h2>
        <form action="login.php" method="POST">
          
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="text" id="email" name="email" class="w-full p-2 border rounded" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                <span class="text-red-600 text-sm"><?= $erreur['email'] ?? '' ?></span>
            </div>
        
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Mot de passe:</label>
                <input type="password" id="password" name="password" class="w-full p-2 border rounded">
                <span class="text-red-600 text-sm"><?=  $erreur['password'] ?? '' ?></span>
            </div>
            <input type="submit" value="Se connecter" name="login" class="bg-blue-500 text-white w-full py-2 rounded">
        </form>
        <p class="mt-4 text-center">Vous n'avez pas de compte ? <a href="register.php" class="text-blue-500">Inscrivez-vous</a></p>
    </div>
</body>
</html>