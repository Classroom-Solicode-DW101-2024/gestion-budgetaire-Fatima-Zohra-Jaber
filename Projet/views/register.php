<?php

    require '../config.php';
    require '../controllers/user.php';

    $erreur = [];
        
    if(isset($_POST['register'])){
        
        if(empty($_POST['name'])){
            $erreur['name'] = "Veuillez entrer votre nom";
        }
        if(empty($_POST['email'])){
            $erreur['email'] = "Veuillez entrer votre adresse email";
        }elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $erreur['email'] = "Veuillez entrer une adresse email valide";
        }
        if(empty($_POST['password'])){
            $erreur['password'] = "Veuillez entrer votre mot de passe";
        }
        if (empty($_POST['confirmPassword'])) {
            $erreur['confirmPassword'] = "Veuillez confirmer votre mot de passe";
        } elseif ($_POST['password'] !== $_POST['confirmPassword']) {
            $erreur['confirmPassword'] = "La confirmation du mot de passe ne correspond pas";
        }

        if(empty($erreur)){
            $user = [
                'name' => trim(htmlspecialchars($_POST['name'])),
                'email' => trim(htmlspecialchars($_POST['email'])),
                'password' => trim($_POST['password']) 
            ];
            $result = addUser($user, $conn);
            if ($result === true) {
                header("Location: login.php");
                exit;
            } elseif ($result === "email") {
                $erreur['email'] = "Cette adresse email est déjà utilisée.";
            } else {
                $erreur['global'] = "Une erreur est survenue lors de l'inscription. Veuillez réessayer.";
            }
        }      
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-lg w-96">
        <h2 class="text-2xl font-semibold mb-4">Créer un compte</h2>
        
        <?php if (!empty($erreur['global'])): ?>
            <p class="text-red-600 text-sm mb-4"><?= $erreur['global'] ?></p>
        <?php endif; ?>
    <form method="POST">
        <!-- Le ?? signifie: si $_POST['name'] existe et n'est pas null, utilise-le, sinon utilise ''
         isset($_POST['name'])? $_POST['name']:'' = $_POST['name'] ?? '' -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nom</label>
            <input type="text" name="name" id="name" class="w-full p-2 border rounded" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
            <span class="text-red-600 text-sm"><?= $erreur['name'] ?? '' ?></span>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="text" id="email" name="email" class="w-full p-2 border rounded" value="<?= htmlspecialchars($_POST['email'] ?? '')?>">
            <span class="text-red-600 text-sm"><?= $erreur['email'] ?? ''?></span>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Mot de passe</label>
            <input type="password" id="password" name="password" class="w-full p-2 border rounded">
            <span class="text-red-600 text-sm"><?=$erreur['password'] ?? ''?></span>
        </div>

        <div class="mb-4">
            <label for="confirmPassword" class="block text-gray-700">Confirmer le mot de passe</label>
            <input type="password" id="confirmPassword" name="confirmPassword" class="w-full p-2 border rounded">
            <span class="text-red-600 text-sm"><?= $erreur['confirmPassword'] ?? ''?></span>
        </div>

        <input type="submit" name="register" value="S'inscrire"  class="bg-blue-500 text-white w-full py-2 rounded">
    </form>
    <p class="mt-4 text-center">Vous avez déjà un compte ? <a href="login.php" class="text-blue-500">Connectez-vous</a></p>
    </div>
</body>
</html>
