<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>

<body class="text-black font-poppins">

  <nav class="p-5 bg-white shadow md:flex md:items-center md:justify-between b-opacity-0">
    <div class="flex justify-between items-center ">
      <span class="text-2xl font-[Poppins] cursor-pointer">
        <!-- Hospital Management System -->
        <img src="https://www.hospitalmanagementasia.com/wp-content/uploads/2022/08/Hospital-Management-Logo-Big-PNG.png" alt="image here" class="mix-blend-darken h-12">
      </span>

      <span class="text-3xl cursor-pointer mx-2 md:hidden block">
        <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
      </span>
    </div>


    <ul class="md:flex md:items-center z-[-1] md:z-auto md:static absolute bg-white w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500">

      <?php
      if (isset($_SESSION['admin'])) {

        $user = $_SESSION['admin'];
        echo '
           <li class="mx-4 my-6 md:my-0">
            <a href="index.php"  class="text-xl hover:text-cyan-500 duration-500">' . $user . '</a>
           </li>
          <li class="mx-4 my-6 md:my-0">
           <a href="admin_logout.php" class="text-xl hover:text-cyan-500 duration-500">LOGOUT</a>
          </li>
        ';
      } else if (isset($_SESSION['doctor'])) {


        $user = $_SESSION['doctor'];
        echo '
          <li class="mx-4 my-6 md:my-0">
            <a href="index.php"  class="text-xl hover:text-cyan-500 duration-500">' . $user . '</a>
           </li>
          <li class="mx-4 my-6 md:my-0">
           <a href="doctor_logout.php" class="text-xl hover:text-cyan-500 duration-500">LOGOUT</a>
          </li>
          ';
      } else if (isset($_SESSION['patient'])) {
        $user = $_SESSION['patient'];
        echo '
          <li class="mx-4 my-6 md:my-0">
            <a href="index.php"  class="text-xl hover:text-cyan-500 duration-500">' . $user . '</a>
           </li>
          <li class="mx-4 my-6 md:my-0">
           <a href="patient_logout.php" class="text-xl hover:text-cyan-500 duration-500">LOGOUT</a>
          </li>
          ';
      } else {

        echo '
       
      <li class="mx-4 my-6 md:my-0">
        <a href="index.php"  class="text-xl hover:text-cyan-500 duration-500">HOME</a>
      </li>
      <li class="mx-4 my-6 md:my-0">
        <a href="#Service" class="text-xl hover:text-cyan-500 duration-500">SERVICE</a>
      </li>

      <li class="mx-4 my-6 md:my-0">
        <a href="#contact" class="text-xl hover:text-cyan-500 duration-500">CONTACT</a>
      </li>

      <li class="mx-4 my-6 md:my-0">
        <a href="#Blogs" class="text-xl hover:text-cyan-500 duration-500">BLOGS</a>
      </li>
      <!-- Dropdown -->
      <!-- Dropdown menu -->
      <div class="relative z-10">
        <button type="button" class="dropdown-toggle py-2 px-3 hover:text-cyan-500  flex items-center gap-2 rounded text-xl">
          <span class="pointer-events-none select-none">LOGIN</span>
          <svg class="w-3 h-3 pointer-events-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
          </svg>
        </button>
        <div class="dropdown-menu absolute hidden bg-sky-700 text-white rounded-b-lg pb-2 w-48">
          <a href="adminlogin.php" class="block px-6 py-2 hover:bg-sky-800">Admin Login</a>
          <a href="doctorlogin.php"  class="block px-6 py-2 hover:bg-sky-800">Doctor Login</a>
          <a href="patientlogin.php" class="block px-6 py-2 hover:bg-sky-800">User Login</a>
        </div>
      </div>

      <li class="mx-4 my-6 md:my-0">
        <a href="#contact" class="text-xl hover:text-cyan-500 duration-500">ABOUT</a>
      </li>
  
    ';
      }

      ?>
    </ul>
  </nav>


  <script>
    function Menu(e) {
      let list = document.querySelector('ul');
      e.name === 'menu' ? (e.name = "close", list.classList.add('top-[80px]'), list.classList.add('opacity-100')) : (e.name = "menu", list.classList.remove('top-[80px]'), list.classList.remove('opacity-100'))
    }

    document.addEventListener("DOMContentLoaded", () => {
      // Select all dropdown toggle buttons
      const dropdownToggles = document.querySelectorAll(".dropdown-toggle")

      dropdownToggles.forEach((toggle) => {
        toggle.addEventListener("click", () => {
          // Find the next sibling element which is the dropdown menu
          const dropdownMenu = toggle.nextElementSibling

          // Toggle the 'hidden' class to show or hide the dropdown menu
          if (dropdownMenu.classList.contains("hidden")) {
            // Hide any open dropdown menus before showing the new one
            document.querySelectorAll(".dropdown-menu").forEach((menu) => {
              menu.classList.add("hidden")
            })

            dropdownMenu.classList.remove("hidden")
          } else {
            dropdownMenu.classList.add("hidden")
          }
        })
      })

      // Clicking outside of an open dropdown menu closes it
      window.addEventListener("click", function(e) {
        if (!e.target.matches(".dropdown-toggle")) {
          document.querySelectorAll(".dropdown-menu").forEach((menu) => {
            if (!menu.contains(e.target)) {
              menu.classList.add("hidden")
            }
          })
        }
      })

      // Mobile menu toggle

      const mobileMenuButton = document.querySelector('.mobile-menu-button')
      const mobileMenu = document.querySelector('.navigation-menu')

      mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden')
      })


    })
  </script>
</body>

</html>