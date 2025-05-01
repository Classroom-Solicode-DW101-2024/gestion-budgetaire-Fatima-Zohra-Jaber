<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DigiWallet - Gérez votre budget en toute simplicité</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-white text-gray-800 font-sans">

  <div class="h-screen flex flex-col">
    <!-- Section Header -->
    <header class="bg-blue-700 text-white shadow">
      <div class="container mx-auto py-4 flex justify-between items-center">
        <img src="images/logo1.png" alt="" class="h-14 w-auto">
        <nav class="space-x-4">
          <a href="#features" class="px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-700">Fonctionnalités</a>
          <a href="#why" class="px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-700">Pourquoi DigiWallet</a>
        </nav>
        <a href="../Projet/views/login.php" class="bg-white text-blue-700 px-4 py-2 rounded hover:bg-blue-100 transition">
          Connexion
        </a>
      </div>
    </header>


    <!-- Section Hero  -->
    <section class="bg-blue-50 flex-1">
      <div class="container mx-auto flex flex-col-reverse lg:flex-row items-center justify-between">
        <div class="lg:w-1/2 text-center lg:text-left mt-10 lg:mt-0">
          <h1 class="text-4xl md:text-5xl font-bold text-blue-900 mb-4">
            Gérez votre budget <br />facilement avec <br />
            <span class="text-blue-600 leading-normal">DigiWallet</span>
          </h1>
          <p class="text-lg text-blue-800 mb-6">
            Gardez le contrôle de vos dépenses, suivez vos<br /> revenus,
            et atteignez vos objectifs financiers <br /> avec une application moderne et intuitive.
          </p>
          <div class="flex gap-4">
            <a href="../Projet/views/register.php" class="bg-blue-700 text-white px-6 py-3 rounded-md font-semibold hover:bg-blue-800 transition">
              Commencer
            </a>
            <a href="../Projet/views/login.php" class="border border-blue-600 text-blue-600 px-6 py-3 rounded-md font-semibold hover:bg-blue-100 transition">
              Connexion
            </a>
          </div>
        </div>
        <div class="lg:w-1/2 flex justify-center">
          <img src="images/bgHero.png" alt="Aperçu DigiWallet" class="max-w-full drop-shadow-xl rounded">
        </div>
      </div>
    </section>
  </div>

  <!-- Fonctionnalités -->
  <section id="features" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto">
      <h3 class="text-4xl font-bold text-center text-blue-900 mb-14">Fonctionnalités clés</h3>
      <div class="grid md:grid-cols-3 gap-10 text-center">

        <div class="p-8 bg-blue-50 rounded-2xl shadow-md hover:shadow-xl transition duration-300">
          <div class="text-4xl mb-4">💰</div>
          <h4 class="text-xl font-semibold text-blue-800 mb-3">
            Solde et transactions
          </h4>
          <p class="text-gray-600 leading-relaxed">
            Suivez en temps réel l’évolution de votre solde et accédez à un historique clair de toutes vos transactions, pour garder le contrôle total sur vos finances.
          </p>
        </div>

        <div class="p-8 bg-blue-50 rounded-2xl shadow-md hover:shadow-xl transition duration-300">
          <div class="text-4xl mb-4">🧾</div>
          <h4 class="text-xl font-semibold text-blue-800 mb-3">
            Historique détaillé
          </h4>
          <p class="text-gray-600 leading-relaxed">
            Consultez vos dépenses et revenus passés avec des filtres pratiques par mois, année ou catégorie, pour mieux comprendre et anticiper vos habitudes de consommation.
          </p>
        </div>

        <div class="p-8 bg-blue-50 rounded-2xl shadow-md hover:shadow-xl transition duration-300">
          <div class="text-4xl mb-4">🔒</div>
          <h4 class="text-xl font-semibold text-blue-800 mb-3">
            Sécurité avancée
          </h4>
          <p class="text-gray-600 leading-relaxed">
            Vos données personnelles et financières sont entièrement cryptées et stockées de manière sécurisée, afin de garantir une confidentialité maximale à chaque instant.
          </p>
        </div>

      </div>
    </div>
  </section>


  <!-- Pourquoi DigiWallet -->
  <section id="why" class="py-20 bg-blue-50">
    <div class="max-w-6xl mx-auto px-6 text-center">
      <h3 class="text-4xl font-extrabold text-blue-900 mb-6">
        Pourquoi choisir <span class="text-blue-600">DigiWallet</span> ?
      </h3>
      <p class="text-lg text-gray-700 max-w-3xl mx-auto mb-10 leading-relaxed">
        DigiWallet vous accompagne dans votre quotidien pour gérer vos finances personnelles avec simplicité et sérénité. Grâce à une interface moderne, une synchronisation fluide sur tous vos appareils et une utilisation totalement gratuite, vous gardez toujours le contrôle de votre budget, où que vous soyez.
      </p>
      <a href="../Projet/views/register.php" class="inline-block bg-blue-700 hover:bg-blue-800 text-white font-semibold px-8 py-3 rounded-full shadow-lg transition duration-300">
        Créer mon compte gratuitement
      </a>
    </div>
  </section>

  <footer class="bg-blue-700 text-gray-100 py-8">
    <div class="max-w-7xl mx-auto pb-6 grid grid-cols-1 md:grid-cols-3 gap-16 border-b border-gray-300">

      <!-- Logo + Description -->
      <div>
        <img src="images/logo1.png" alt="Logo DigiWallet" class="h-14 w-auto mb-4">
        <p class="text-sm text-gray-300 leading-relaxed">
          Gérez votre budget, suivez vos dépenses, et sécurisez vos données financières avec DigiWallet — votre compagnon financier au quotidien.
        </p>
      </div>

      <!-- Navigation -->
      <div class="w-18">
        <h3 class="text-lg font-semibold text-white mb-4">Navigation</h3>
        <ul class="space-y-2 text-sm text-gray-300">
          <li><a href="#features" class="hover:text-white transition-colors">Fonctionnalités</a></li>
          <li><a href="#why" class="hover:text-white transition-colors">Pourquoi nous ?</a></li>
          <li><a href="../Projet/views/register.php" class="hover:text-white transition-colors">Inscription</a></li>
          <li><a href="../Projet/views/login.php" class="hover:text-white transition-colors">Connexion</a></li>
        </ul>
      </div>

      <!-- Réseaux sociaux -->
      <div>
        <h3 class="text-lg font-semibold text-white mb-4">Suivez-nous</h3>
        <div class="flex space-x-4">
          <!-- Facebook -->
          <a href="#" class="bg-blue-100 text-blue-600 p-2 rounded-full hover:bg-blue-200 transition" aria-label="Facebook">
            <svg class="w-6 h-6 fill-current text-blue-700 hover:text-white" viewBox="0 0 24 24">
              <path d="M22 12A10 10 0 1 0 10 21.7v-7.3h-2v-3h2V9.5c0-2 1.2-3.1 3-3.1.9 0 1.8.1 1.8.1v2h-1c-1 0-1.3.6-1.3 1.2V11h2.5l-.4 3H13v7A10 10 0 0 0 22 12z" />
            </svg>
          </a>

          <!-- YouTube -->
          <a href="#" class="bg-blue-100 text-blue-600 p-2 rounded-full hover:bg-blue-200 transition" aria-label="YouTube">
            <svg class="w-6 h-6 fill-current text-blue-700 hover:text-white" viewBox="0 0 24 24">
              <path d="M23.5 6.2s-.2-1.6-.8-2.3c-.7-.9-1.5-1-1.9-1.1C17.9 2.5 12 2.5 12 2.5h0s-5.9 0-8.8.3c-.4 0-1.2.2-1.9 1.1-.6.7-.8 2.3-.8 2.3S.2 8.2.2 10.2v1.6c0 2 .2 4 .2 4s.2 1.6.8 2.3c.7.9 1.7.9 2.1 1 1.5.1 6.7.3 6.7.3s5.9 0 8.8-.3c.4 0 1.2-.2 1.9-1.1.6-.7.8-2.3.8-2.3s.2-2 .2-4v-1.6c0-2-.2-4-.2-4zM9.8 15V9l5.6 3-5.6 3z" />
            </svg>
          </a>

          <!-- Twitter -->
          <a href="#" class="bg-blue-100 text-blue-600 p-2 rounded-full hover:bg-blue-200 transition" aria-label="Twitter">
            <svg class="w-6 h-6 fill-current text-blue-700 hover:text-white" viewBox="0 0 24 24">
              <path d="M8 19c7.5 0 11.6-6.2 11.6-11.6v-.5A8.4 8.4 0 0 0 22 4.3a8.2 8.2 0 0 1-2.3.6 4.1 4.1 0 0 0 1.8-2.3 8.2 8.2 0 0 1-2.6 1A4.1 4.1 0 0 0 8.4 8.8a11.6 11.6 0 0 1-8.4-4.3 4.1 4.1 0 0 0 1.3 5.5A4 4 0 0 1 2 8.6v.1c0 2 1.4 3.7 3.3 4.1a4 4 0 0 1-1.8.1 4.1 4.1 0 0 0 3.8 2.8A8.3 8.3 0 0 1 2 18.6 11.6 11.6 0 0 0 8 20" />
            </svg>
          </a>
          <!-- LinkedIn -->
          <a href="#" class="bg-blue-100 text-blue-600 p-2 rounded-full hover:bg-blue-200 transition" aria-label="LinkedIn">
            <svg class="w-6 h-6 fill-current text-blue-700 hover:text-white" viewBox="0 0 24 24">
              <path d="M4.98 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM3 8.5h4v12H3v-12zm7 0h3.6v1.7h.1c.5-.9 1.7-1.8 3.3-1.8 3.6 0 4.3 2.4 4.3 5.5v6.6h-4V14c0-1.4 0-3.2-2-3.2-2 0-2.3 1.6-2.3 3.1v6.6h-4v-12z" />
            </svg>
          </a>
        </div>
      </div>
    </div>

    <p class="text-sm text-gray-300 text-center mt-6">&copy; <?= date('Y') ?> <span class="text-white font-semibold">DigiWallet</span> . Tous droits réservés.</p>

  </footer>



</body>

</html>