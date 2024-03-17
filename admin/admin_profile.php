<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>

<body class="font-poppins">

    <?php
    include("../include/header.php");
    include("../include/connection.php");

    $ad = $_SESSION['admin'];
    $query = "SELECT * FROM admin WHERE username='$ad'";
    $res = mysqli_query($connect, $query);
    $username = "";
    $profile = "";
    while ($row = mysqli_fetch_array($res)) {
        $username = $row['username'];
        $profile = $row['profile'];
    }

    ?>

    <div class="container mx-auto sm:px-4 max-w-full">
        <div class="md:w-full pr-4 pl-4">
            <div class="flex flex-wrap">
                <div class="md:w-1/5 pr-4 pl-4 -ml-12">
                    <?php
                    include("sidenav.php");
                    ?>
                </div>
                <div class="md:w-4/5 pr-4 pl-4">
                    <div class="md:w-full pr-4 pl-4">
                        <div class="flex flex-wrap">
                            <div class="md:w-1/2 pr-4 pl-4">
                                <p class="text-4xl font-bold my-7 bg-cyan-500"><?php echo $username; ?>'s Profile</p>

                                <?php

                                if (isset($_POST['update'])) {

                                    $profile = $_FILES['profile']['name'];
                                    if (empty($profile)) {
                                    } else {
                                        $query = "UPDATE admin SET profile='$profile' WHERE username='$ad'";
                                        $result = mysqli_query($connect, $query);

                                        if ($result) {
                                            move_uploaded_file($_FILES['profile']['tmp_name'], "img/$profile");
                                        }
                                    }
                                }

                                ?>

                                <form method="post" enctype="multipart/form-data">
                                    <?php
                                    echo  "<img src='img/$profile'  class='md:w-full pr-4 pl-4 h-64' alt=''>";
                                    ?>
                                    <br>
                                    <div class="mt-10">
                                        <label class="text-2xl font-lg font-bold">UPDATE PROFILE</label>
                                        <input type="file" name="profile" class="block appearance-none w-full py-1 px-2 my-4 text-base leading-normal bg-white text-gray-800 border-2 border-gray-600 rounded">
                                    </div>
                                    <br>
                                    <input type="submit" name="update" value="UPDATE" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:green-600">

                                </form>

                            </div>
                            <div class="md:w-1/2 pr-4 pl-4">

                                <?php
                                if (isset($_POST['change'])) {

                                    $uname = $_POST['uname'];
                                    if (empty($uname)) {
                                    } else {
                                        $query = "UPDATE admin SET username='$uname' WHERE username='$ad'";

                                        $res = mysqli_query($connect, $query);
                                        if ($res) {
                                            $_SESSION['admin'] = $uname;
                                        }
                                    }
                                }
                                ?>


                                <form method="post" class="my-10">
                                    <label class="text-2xl font-lg font-bold">Change Username</label>
                                    <input type="text" name="uname" class="block appearance-none w-full py-1 px-2 my-6 text-base leading-normal bg-white text-gray-600 border-2 border-gray-700 rounded" autocomplete="off">
                                    <input type="submit" name="change" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:green-600">

                                </form>

                                <br>

                                <?php

                                if (isset($_POST['update_pass'])) {

                                    $old_pass = $_POST['old_pass'];
                                    $new_pass = $_POST['new_pass'];
                                    $con_pass = $_POST['con_pass'];

                                    $error = array();

                                    $old = mysqli_query($connect, "SELECT * FROM admin WHERE username='$ad'");

                                    $row = mysqli_fetch_array($old);
                                    $pass = $row['password'];


                                    if (empty($old_pass)) {
                                        $error['p'] = "Enter Old Password";
                                    } else if (empty($new_pass)) {
                                        $error['p'] = "Enter New Password";
                                    } else if (empty($con_pass)) {
                                        $error['p'] = "Confirm Password";
                                    } else if ($old_pass != $pass) {
                                        $error['p'] = "The old password is not correct";
                                    } else if ($new_pass != $con_pass) {
                                        $error['p'] = "The passwords do not match";
                                    }

                                    if (count($error) == 0) {
                                        $query = "UPDATE admin SET password='$new_pass' WHERE username='$ad'";

                                        mysqli_query($connect, $query);
                                    }
                                }

                                if (isset($error['p'])) {
                                    $e = $error['p'];
                                    $show = "<h5 class='relative block w-full p-4 mb-4 text-base leading-5 text-white bg-red-500 rounded-lg opacity-100'> $e </h5>";
                                } else {
                                    $show = "";
                                }

                                ?>

                                <form method="post">
                                    <p class="text-3xl font-lg font-bold">Change Password</p>
                                    <div>
                                        <?php
                                        echo $show;
                                        ?>
                                    </div>
                                    <div class="mb-4">
                                        <br>
                                        <label class="text-2xl font-semibold">Old Password</label>
                                        <input type="password" name="old_pass" class="block appearance-none w-full py-1 px-2 my-4 text-base leading-normal bg-white text-gray-800 border-2 border-gray-600 rounded">
                                    </div>

                                    <div class="mb-4">
                                        <label class="text-2xl  font-medium">New Password</label><br>
                                        <input type="password" name="new_pass" class="block appearance-none w-full py-1 px-2 mt-4 text-base leading-normal bg-white text-gray-800 border-2 border-gray-600 rounded">
                                    </div>

                                    <div class="mb-4">
                                        <label class="text-2xl font-medium">Confirm New Password</label><br>
                                        <input type="password" name="con_pass" class="block appearance-none w-full py-1 px-2 mt-4 text-base leading-normal bg-white text-gray-800 border-2 border-gray-600 rounded">
                                    </div>

                                    <input type="submit" name="update_pass" value="Update Password" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:green-600">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>



            <script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>

</body>

</html>