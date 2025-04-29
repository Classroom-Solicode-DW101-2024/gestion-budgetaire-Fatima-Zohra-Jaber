
    <!-- Navbar -->
    <nav x-data="{ open: false }" class="bg-white shadow-md backdrop-blur-lg dark:bg-gray-900 dark:shadow-lg">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:max-w-6xl">
            <div class="relative flex h-20 items-center justify-between">
                <div class="flex-shrink-0">
                    <a href="../index.php">
                        <img class="h-14 w-auto" src="../images/logo.png" alt="Gestion Budget Logo">
                    </a>
                </div>
                <div>
                    <a href="dashboard.php" class="text-gray-900 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">
                        Tableau de Bord</a>
                    <a href="transactions.php" class="text-gray-900 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">
                        Transactions</a>
                </div>
                <div class="flex lg:hidden">
                    <button 
                        @click="open = !open" 
                        class="inline-flex items-center justify-center rounded-md bg-gray-50 p-2 text-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary-500"
                    >
                        <span class="sr-only">Ouvrir le menu</span>
                        <!-- Hamburger Icon -->
                        <svg x-show="!open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <!-- Close Icon -->
                        <svg x-show="open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <div class="hidden lg:block">
                        <div x-data="{ dropdown: false }" class="relative">
                            <div class="flex items-center px-4">
                                <button @click="dropdown = !dropdown" 
                                class="flex rounded-full bg-gray-200 p-0.5 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    <img 
                                        class="h-10 w-10 rounded-full" 
                                        src="images/profil.svg" 
                                        alt="Profile image"
                                    >
                                </button>

                                <div class="ml-3">
                                    <div class="text-base font-medium text-gray-900">
                                        <?= $_SESSION['user']['nom'] ?>
                                    </div>
                                    <div class="text-sm font-medium text-gray-500">
                                        <?= $_SESSION['user']['email'] ?>
                                    </div>
                                </div>
                            </div>

                            <div 
                                x-show="dropdown" 
                                @click.outside="dropdown = false"
                                class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg"
                            >
                                <div class="py-1">
                                     <!-- Liens -->
                                    <a href="/profile" class="flex items-center px-4 py-2 hover:bg-gray-100 text-gray-700 text-sm">
                                    <i class="fi fi-rr-user mr-2 text-blue-600"></i> Profile
                                    </a>
                                    <a href="/wallets" class="flex items-center px-4 py-2 hover:bg-gray-100 text-gray-700 text-sm">
                                    <i class="fi fi-rr-wallet mr-2 text-blue-600"></i> Wallets
                                    </a>
                                    <a href="/settings" class="flex items-center px-4 py-2 hover:bg-gray-100 text-gray-700 text-sm">
                                    <i class="fi fi-rr-settings mr-2 text-blue-600"></i> Settings
                                    </a>
                                    <a href="login.php" class="flex items-center px-4 py-2 hover:bg-red-50 text-red-500 text-sm font-medium border-t">
                                    <i class="fi fi-bs-sign-out-alt mr-2"></i> Logout
                                    </a>
                            </div>
                            </div>
                        </div>
                    
                </div>
            </div>
           
            <!-- Mobile Menu -->
            <div x-show="open" class="lg:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="dashboard.php" class="text-gray-900 hover:bg-gray-100 block px-3 py-2 rounded-md font-medium">Tableau de Bord </a>
                    <a href="transactions.php" class="text-gray-900 hover:bg-gray-100 block px-3 py-2 rounded-md font-medium">Transactions</a>

                    
                        <div class="border-t border-gray-200 pt-4">
                          
   
                            <div class="mt-3 space-y-1 px-2">
                                <a href="/profile" class="flex items-center px-4 py-2 hover:bg-gray-100 text-gray-700 text-sm">
                                <i class="fi fi-rr-user mr-2 text-blue-600"></i> Profile
                                </a>
                                <a href="/wallets" class="flex items-center px-4 py-2 hover:bg-gray-100 text-gray-700 text-sm">
                                <i class="fi fi-rr-wallet mr-2 text-blue-600"></i> Wallets
                                </a>
                                <a href="/settings" class="flex items-center px-4 py-2 hover:bg-gray-100 text-gray-700 text-sm">
                                <i class="fi fi-rr-settings mr-2 text-blue-600"></i> Settings
                                </a>
                                <a href="/signin" class="flex items-center px-4 py-2 hover:bg-red-50 text-red-500 text-sm font-medium border-t">
                                <i class="fi fi-bs-sign-out-alt mr-2"></i> Logout
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </nav>

  

