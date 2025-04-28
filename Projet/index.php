<?php 
    require_once 'config.php';
    require_once 'controllers/transactions.php';

    
    if(isset($_POST['add'])){
        $transaction['user_id'] = $_SESSION['user']['id'];
        $transaction['category_id'] = $_POST['categoryId'];
        $transaction['montant'] = trim(htmlspecialchars($_POST['montant']));
        $transaction['description'] = trim(htmlspecialchars($_POST['description']));
        $transaction['date_transaction'] = $_POST['date_transaction'];
        addTransaction($transaction,$conn);
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
     <!-- Navbar -->
     <header
      class="ic-navbar absolute left-0 top-0 z-40 flex w-full items-center bg-transparent"
      role="banner"
      aria-label="Navigation bar"
    >
      <div class="container">
        <div
          class="ic-navbar-container relative -mx-5 flex items-center justify-between"
        >
          <div class="w-60 lg:w-56 max-w-full px-5">
            <a
              href="."
              class="ic-navbar-logo block w-full py-5 text-primary-color"
            >
                <img
                    class="h-16 w-auto"
                    src="images/logo.png"
                    alt="Budget Management Logo"
                />
            </a>
          </div>
          <div class="flex w-full items-center justify-between px-5">
            <div>
              <button
                type="button"
                class="ic-navbar-toggler absolute right-4 top-1/2 block -translate-y-1/2 rounded-md px-3 py-[6px] text-[22px]/none text-primary-color ring-primary focus:ring-2 lg:hidden"
                data-web-toggle="navbar-collapse"
                data-web-target="navbarMenu"
                aria-expanded="false"
                aria-label="Toggle navigation menu"
              >
                <i class="lni lni-menu"></i>
              </button>

              <nav
                id="navbarMenu"
                class="ic-navbar-collapse absolute right-4 top-[80px] w-full max-w-[250px] rounded-lg hidden bg-primary-light-1 py-5 shadow-lg dark:bg-primary-dark-1 lg:static lg:block lg:w-full lg:max-w-full lg:bg-transparent lg:py-0 lg:shadow-none dark:lg:bg-transparent xl:px-6"
              >
                <ul
                  class="block lg:flex"
                  role="menu"
                  aria-label="Navigation menu"
                >
                  <li class="group relative">
                    <a
                      href="#home"
                      class="ic-page-scroll mx-8 flex py-2 text-base font-medium text-body-light-12 group-hover:text-primary dark:text-body-dark-12 lg:mx-0 lg:inline-flex lg:px-0 lg:py-6 lg:text-primary-color lg:dark:text-primary-color lg:group-hover:text-primary-color lg:group-hover:opacity-70 active"
                      role="menuitem"
                      >Home</a
                    >
                  </li>

                  <li class="group relative">
                    <a
                      href="#services"
                      class="ic-page-scroll mx-8 flex py-2 text-base font-medium text-body-light-12 group-hover:text-primary dark:text-body-dark-12 lg:mr-0 lg:inline-flex lg:px-0 lg:py-6 lg:text-primary-color lg:dark:text-primary-color lg:group-hover:text-primary-color lg:group-hover:opacity-70"
                      role="menuitem"
                      >Services</a
                    >
                  </li>

                  <li class="group relative">
                    <a
                      href="#portfolio"
                      class="ic-page-scroll mx-8 flex py-2 text-base font-medium text-body-light-12 group-hover:text-primary dark:text-body-dark-12 lg:mr-0 lg:inline-flex lg:px-0 lg:py-6 lg:text-primary-color lg:dark:text-primary-color lg:group-hover:text-primary-color lg:group-hover:opacity-70"
                      role="menuitem"
                      >Portfolio</a
                    >
                  </li>

                  
                </ul>
              </nav>
            </div>
            <div class="flex items-center justify-end pr-[52px] lg:pr-0">
              <button
                type="button"
                class="inline-flex items-center text-primary-color text-[24px]/none"
                aria-label="Switch theme"
                data-web-trigger="web-theme"
              ></button>
              <div class="hidden sm:flex">
                <a
                  href="javascript:void(0)"
                  class="btn-navbar ml-5 px-6 py-3 rounded-md bg-primary-color bg-opacity-20 text-base font-medium text-primary-color hover:bg-opacity-100 hover:text-primary"
                  role="button"
                  >Get Started</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- <header class="bg-blue-500 text-white p-4">
        <h1 class="text-2xl font-bold">Welcome to Your Budget Management System</h1>
        <nav >
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="views/register.php">Register</a></li>
                <li><a href="views/login.php">Login</a></li>
                <li><a href="views/dashboard.php">Logout</a></li>
                <li><a href="views/transactions.php">Transactions</a></li>
            </ul>
        </nav>
    </header> -->
    <main>
         <!-- Hero section -->
      <section
        id="home"
        class="relative overflow-hidden bg-primary text-primary-color pt-[120px] md:pt-[130px] lg:pt-[160px]"
      >
        <div class="container">
          <div class="-mx-5 flex flex-wrap items-center">
            <div class="w-full px-5">
              <div class="scroll-revealed mx-auto max-w-[780px] text-center">
                <h1
                  class="mb-6 text-3xl font-bold leading-snug text-primary-color sm:text-4xl sm:leading-snug lg:text-5xl lg:leading-tight"
                >
                  Tailwind CSS Company Landing Page by Ranyeh
                </h1>

                <p
                  class="mx-auto mb-9 max-w-[600px] text-base text-primary-color sm:text-lg sm:leading-normal"
                >
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Possimus qui impedit veniam, nesciunt nostrum vel repellat
                  reprehenderit dignissimos harum, iste ex sit illo?
                </p>

                <ul
                  class="mb-10 flex flex-wrap items-center justify-center gap-4 md:gap-5"
                >
                  <li>
                    <a
                      href="javascript:void(0)"
                      class="inline-flex items-center justify-center rounded-md bg-primary-color text-primary px-5 py-3 text-center text-base font-medium shadow-md hover:bg-primary-light-5 md:px-7 md:py-[14px]"
                      role="button"
                      >Get Started</a
                    >
                  </li>

                  <li>
                    <a
                      href="javascript:boid(0)"
                      class="video-popup flex items-center gap-4 rounded-md bg-primary-color/[0.15] px-5 py-3 text-base font-medium text-primary-color hover:bg-primary-color hover:text-primary md:px-7 md:py-[14px]"
                      role="button"
                      ><i class="lni lni-play text-lg/none"></i> Watch Intro</a
                    >
                  </li>
                </ul>

                <div>
                  <p class="mb-4 text-center text-primary-color">Powered by</p>

                  <div
                    class="scroll-revealed flex items-center justify-center gap-4 text-center"
                  >
                    <a
                      href="https://tailwindcss.com/"
                      target="_blank"
                      class="text-primary-color/60 hover:text-primary-color"
                    >
                      <svg
                        class="fill-current"
                        height="26"
                        viewBox=".16 .18 799.8 98.72"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="m248.04 41.78h-14.42v27.79c0 7.41 4.89 7.29 14.42 6.83v11.23c-19.3 2.32-26.98-3.01-26.98-18.06v-27.79h-10.7v-12.05h10.7v-15.55l12.56-3.7v19.25h14.42zm54.98-12.05h12.56v57.9h-12.56v-8.34c-4.42 6.14-11.29 9.85-20.36 9.85-15.81 0-28.95-13.32-28.95-30.46 0-17.25 13.14-30.45 28.95-30.45 9.07 0 15.94 3.7 20.36 9.72zm-18.38 47.48c10.47 0 18.38-7.76 18.38-18.53s-7.91-18.53-18.38-18.53-18.37 7.76-18.37 18.53 7.9 18.53 18.37 18.53zm51.87-56.16c-4.42 0-8.03-3.71-8.03-7.99.01-1.05.22-2.09.62-3.06a7.997 7.997 0 0 1 4.34-4.32c.97-.4 2.02-.61 3.07-.61s2.09.21 3.07.61c.97.4 1.85.99 2.6 1.73.74.75 1.33 1.63 1.74 2.59.4.97.61 2.01.61 3.06 0 4.28-3.6 7.99-8.02 7.99zm-6.28 66.58v-57.9h12.56v57.9zm27.1 0v-84.53h12.56v84.53zm94.08-57.9h13.26l-18.26 57.9h-12.33l-12.09-39.02-12.21 39.02h-12.33l-18.26-57.9h13.26l11.28 39.95 12.21-39.95h11.98l12.09 39.95zm28.84-8.68c-4.42 0-8.02-3.71-8.02-7.99 0-1.05.21-2.09.61-3.06.41-.96 1-1.84 1.74-2.59.75-.74 1.63-1.33 2.6-1.73.98-.4 2.02-.61 3.07-.61a8.044 8.044 0 0 1 5.67 2.34c.75.75 1.34 1.63 1.74 2.59.41.97.62 2.01.62 3.06 0 4.28-3.61 7.99-8.03 7.99zm-6.28 66.58v-57.9h12.56v57.9zm80.02-35.55v35.55h-12.56v-34.27c0-8.81-5.12-13.44-13.03-13.44-8.26 0-14.77 4.87-14.77 16.68v31.03h-12.56v-57.9h12.56v7.41c3.84-6.02 10.12-8.91 18.03-8.91 13.02 0 22.33 8.8 22.33 23.85zm59.54-45.51h12.56v81.06h-12.56v-8.34c-4.42 6.14-11.28 9.85-20.35 9.85-15.82 0-28.96-13.32-28.96-30.46 0-17.25 13.14-30.45 28.96-30.45 9.07 0 15.93 3.7 20.35 9.72zm-18.37 70.64c10.46 0 18.37-7.76 18.37-18.53s-7.91-18.53-18.37-18.53c-10.47 0-18.38 7.76-18.38 18.53s7.91 18.53 18.38 18.53zm42.33-18.53c0-17.25 13.14-30.45 30.7-30.45 11.4 0 21.28 5.9 25.93 14.94l-10.81 6.25c-2.56-5.44-8.26-8.92-15.24-8.92-10.23 0-18.02 7.76-18.02 18.18s7.79 18.18 18.02 18.18c6.98 0 12.68-3.59 15.47-8.91l10.82 6.13c-4.89 9.15-14.77 15.06-26.17 15.06-17.56 0-30.7-13.32-30.7-30.46zm108.85 12.62c0 11.58-10.12 17.84-22.68 17.84-11.63 0-20-5.22-23.72-13.55l10.81-6.26c1.87 5.22 6.52 8.34 12.91 8.34 5.59 0 9.89-1.85 9.89-6.48 0-10.31-31.28-4.52-31.28-25.25 0-10.88 9.42-17.71 21.28-17.71 9.53 0 17.44 4.4 21.51 12.04l-10.58 5.91c-2.09-4.52-6.16-6.6-10.93-6.6-4.54 0-8.49 1.96-8.49 6.13 0 10.54 31.28 4.17 31.28 25.59zm53.62 0c0 11.58-10.12 17.84-22.68 17.84-11.63 0-20.01-5.22-23.73-13.55l10.82-6.26c1.86 5.22 6.51 8.34 12.91 8.34 5.58 0 9.88-1.85 9.88-6.48 0-10.31-31.28-4.52-31.28-25.25 0-10.88 9.42-17.71 21.28-17.71 9.54 0 17.45 4.4 21.52 12.04l-10.59 5.91c-2.09-4.52-6.16-6.6-10.93-6.6-4.53 0-8.49 1.96-8.49 6.13 0 10.54 31.29 4.17 31.29 25.59z"
                        />
                        <path
                          d="m82.79.18c-22.03 0-35.81 10.97-41.32 32.91 8.27-10.97 17.91-15.09 28.93-12.35 6.28 1.57 10.77 6.11 15.75 11.14 8.1 8.18 17.48 17.66 37.96 17.66 22.03 0 35.8-10.97 41.31-32.91-8.26 10.97-17.9 15.08-28.92 12.34-6.28-1.56-10.78-6.11-15.75-11.13-8.1-8.19-17.48-17.66-37.96-17.66zm-41.32 49.36c-22.03 0-35.8 10.97-41.31 32.91 8.26-10.97 17.9-15.08 28.92-12.34 6.29 1.56 10.78 6.11 15.75 11.13 8.1 8.19 17.48 17.66 37.96 17.66 22.04 0 35.81-10.97 41.32-32.91-8.27 10.97-17.91 15.09-28.92 12.35-6.29-1.57-10.78-6.11-15.76-11.14-8.1-8.18-17.48-17.66-37.96-17.66z"
                        />
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-full px-5">
              <div class="scroll-revealed relative z-10 mx-auto max-w-[845px]">
                <figure class="mt-16">
                  <img
                    src="./assets/img/hero.png"
                    alt="Hero image"
                    class="mx-auto max-w-full rounded-t-xl rounded-tr-xl"
                  />
                </figure>

                <div class="absolute -left-9 bottom-0 z-[-1]">
                  <img
                    src="./assets/img/dots.svg"
                    alt
                    class="w-[120px] opacity-75"
                  />
                </div>

                <div class="absolute -right-6 -top-6 z-[-1]">
                  <img
                    src="./assets/img/dots.svg"
                    alt
                    class="w-[120px] opacity-75"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
        
    </main>
    <footer class="bg-blue-500 text-white p-4">
        <p>&copy; 2023 Your Budget Management System</p>
        <p><a href="privacy.php">Privacy Policy</a></p>
        <p><a href="terms.php">Terms of Service</a></p>
        <p><a href="contact.php">Contact Us</a></p>
    </footer>

</body>
</html>