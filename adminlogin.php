<?php

session_start();

include("include/connection.php");

if (isset($_POST['login'])) {

  $username = $_POST['uname'];
  $password = $_POST['pass'];

  $error = array();

  if (empty($username)) {
    $error['admin'] = "Enter Username";
  } elseif (empty($password)) {
    $error['admin'] = "Enter password";
  }

  if (count($error) == 0) {
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

    $result = mysqli_query($connect, $query);


    // if everything is entered correctly this code will run
    if (mysqli_num_rows($result) == 1) {
      echo "<script> 
      alert('You have successfully logged in as an admin')
     </script>";

      $_SESSION['admin'] = $username;

      header("Location:admin/admin_index.php");
      exit();
    } else {
      echo "<script> 
            alert('Invalid username or password')
           </script>";
    }
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="include/output.css">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
</head>

<body>
  <?php
  include("include/header.php");
  ?>

  <section class="bg-gray-50 min-h-screen flex items-center justify-center">
    <!-- login container -->
    <div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center">
      <!-- form -->
      <div class="md:w-1/2 px-8 md:px-16">
        <h2 class="font-bold text-2xl text-[#002D74]">Login</h2>
        <p class="text-xs mt-4 text-[#002D74]">If you are already a member, easily log in</p>

        <form method="POST" class="flex flex-col gap-4">

          <div class="">
            <!-- <div> -->
            <?php

            if (isset($error['admin'])) {
              $sh = $error['admin'];

              $show = "<h4 class='p-4 my-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-500 dark:text-red-400'>$sh</h4>";
            } else {
              $show = "";
            }

            echo $show;

            ?>

          </div>
          <input class="p-2 mt-8 rounded-xl border" type="text" name="uname" placeholder="UserName" autocomplete="off">
          <div class="relative">
            <input class="p-2 rounded-xl border w-full" type="password" name="pass" placeholder="Password">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2" viewBox="0 0 16 16">
              <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
              <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
            </svg>
          </div>
          <!-- <button class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300" value="Login" type="submit">Login</button> -->
          <input type="submit" name="login" class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300" value="Login">
        </form>

        <div class="mt-6 grid grid-cols-3 items-center text-gray-400">
          <hr class="border-gray-400">
          <p class="text-center text-sm">OR</p>
          <hr class="border-gray-400">
        </div>

        <button class="bg-white border py-2 w-full rounded-xl mt-5 flex justify-center items-center text-sm hover:scale-105 duration-300 text-[#002D74]">
          <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="25px">
            <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" />
            <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" />
            <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" />
            <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z" />
          </svg>
          Login with Google
        </button>

        <div class="mt-5 text-xs border-b border-[#002D74] py-4 text-[#002D74]">
          <a href="#">Forgot your password?</a>
        </div>

        <div class="mt-3 text-xs flex justify-between items-center text-[#002D74]">
          <p>Don't have an account?</p>
          <a href='register.php' class="py-2 px-5 bg-white border rounded-xl hover:scale-110 duration-300">Register</a>
        </div>
      </div>

      <!-- image -->
      <div class="md:block hidden w-1/2">
        <img class="rounded-2xl" src="https://blogassets.leverageedu.com/blog/wp-content/uploads/2019/12/19111336/Career-in-Hospital-Administration.png">
      </div>
    </div>
  </section>

</body>

</html>