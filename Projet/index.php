<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DigiWallet - Gérez votre budget en toute simplicité</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white text-gray-800 font-sans">

  <!-- En-tête -->
  <header class="bg-blue-700 text-white shadow">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <img src="images/logo1.png" alt="" class="h-14 w-auto">
      <nav class="space-x-4">
        <a href="#features" class="hover:underline">Fonctionnalités</a>
        <a href="#why" class="hover:underline">Pourquoi DigiWallet</a>
        <a href="../Projet/views/login.php" class="bg-white text-blue-700 px-4 py-2 rounded hover:bg-gray-100 transition">Connexion</a>
      </nav>
    </div>
  </header>


<!-- Section Hero  -->
<section class="bg-blue-50 py-20">
  <div class="container mx-auto px-4 flex flex-col-reverse lg:flex-row items-center justify-between">
    <!-- Texte -->
    <div class="lg:w-1/2 text-center lg:text-left mt-10 lg:mt-0">
      <h2 class="text-4xl font-extrabold text-blue-900 mb-4">Votre budget, simplifié avec <span class="text-blue-600">DigiWallet</span></h2>
      <p class="text-lg text-blue-800 mb-6">
        Gardez le contrôle de vos dépenses, suivez vos revenus, et atteignez vos objectifs financiers avec une application moderne et intuitive.
      </p>
      <div class="space-x-4">
        <a href="register.php" class="bg-blue-600 text-white px-6 py-3 rounded shadow hover:bg-blue-700 transition">Créer un compte</a>
      </div>
    </div>

    <!-- Image de l'application -->
    <div class="lg:w-1/2 flex justify-center">
      <img src="bghero.png" alt="Aperçu DigiWallet" class="max-w-full h-auto drop-shadow-xl rounded">
    </div>
  </div>
</section>

  <!-- Fonctionnalités -->
  <section id="features" class="py-16 bg-white">
    <div class="container mx-auto px-4">
      <h3 class="text-3xl font-bold text-center mb-12">Fonctionnalités clés</h3>
      <div class="grid md:grid-cols-3 gap-8 text-center">
        <div class="p-6 bg-gray-50 rounded shadow hover:shadow-md transition">
          <h4 class="text-xl font-semibold mb-2">📊 Solde et transactions</h4>
          <p class="text-gray-600">Visualisez votre solde et toutes vos opérations en un coup d'œil.</p>
        </div>
        <div class="p-6 bg-gray-50 rounded shadow hover:shadow-md transition">
          <h4 class="text-xl font-semibold mb-2">📆 Historique détaillé</h4>
          <p class="text-gray-600">Filtrez vos dépenses par mois, année, et catégorie.</p>
        </div>
        <div class="p-6 bg-gray-50 rounded shadow hover:shadow-md transition">
          <h4 class="text-xl font-semibold mb-2">🔒 Sécurité des données</h4>
          <p class="text-gray-600">Vos informations sont cryptées pour une protection maximale.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Pourquoi DigiWallet -->
  <section id="why" class="py-16 bg-gray-100">
    <div class="container mx-auto px-4 text-center">
      <h3 class="text-3xl font-bold mb-6">Pourquoi choisir DigiWallet ?</h3>
      <p class="text-gray-700 max-w-2xl mx-auto mb-8">DigiWallet est votre compagnon idéal pour une gestion financière simple, rapide et efficace. Profitez d'une interface intuitive, accessible sur tous vos appareils, gratuitement.</p>
      <a href="../Projet/views/register.php" class="bg-blue-600 text-white px-6 py-3 rounded shadow hover:bg-blue-700 transition">
        Rejoindre DigiWallet
      </a>
    </div>
  </section>

  <!-- Pied de page -->
  <footer class="bg-blue-700 text-white py-6">
    <div class="container mx-auto px-4 text-center">
      &copy; <?= date('Y') ?> DigiWallet. Tous droits réservés.
    </div>
  </footer>

</body>
</html>
