<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Profile</title>
</head>

<body>

    <?php

    include("../include/header.php");
    include("../include/connection.php");

    ?>

    <div class="container max-w-full mx-auto sm:px-4">
        <div class="md:w-full pr-4 pl-4">
            <div class="flex flex-wrap">
                <div class="md:w-1/5 pr-4 pl-4 -ml-12">
                    <?php
                    include("patient_sidenav.php");

                    $patient = $_SESSION['patient'];
                    $query = "SELECT * FROM patient WHERE username='$patient' ";
                    $res = mysqli_query($connect, $query);
                    $row = mysqli_fetch_array($res);

                    ?>
                </div>
                <div class="md:w-4/5 pr-4 pl-4">
                    <div class="md:w-full pr-4 pl-4">
                        <div class="flex flex-wrap">
                            <div class="md:w-1/2 pr-4 pl-4">

                                <?php
                                if (isset($_POST['upload'])) {
                                    $img = $_FILES['img']['name'];

                                    if (empty($img)) {
                                        echo " <h5 class='relative block w-full p-4 text-base leading-5 text-white bg-red-500 rounded-lg opacity-100 mt-8'>Please Enter Image</h5>";
                                    } else {
                                        $query = "UPDATE patient SET profile='$img' WHERE username='$patient'";
                                        $res = mysqli_query($connect, $query);

                                        if ($res) {
                                            move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
                                        }
                                    }
                                }
                                ?>

                                <h1 class="my-5 font-bold text-4xl">My Profile</h1>
                                <form method="post" enctype="multipart/form-data">
                                    <?php
                                    echo "<img src='img/" . $row['profile'] . "' alt='' class='md:w-full pr-4 pl-4 h-64'>";
                                    ?>

                                    <input type="file" name="img" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded my-6 " accept="image/png, image/jpeg">
                                    <input type="submit" name="upload" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-teal-500 text-white hover:bg-teal-600 my-6">
                                </form>

                                <table class="w-full max-w-full my-8 bg-transparent">
                                    <tr class="border ">
                                        <th class="border text-center p-2" colspan="2">
                                            My Details
                                        </th>
                                    </tr>

                                    <tr class="border">
                                        <td class="border p-2">FirstName</td>
                                        <td class="border p-2"><?php echo $row['firstname'] ?></td>
                                    </tr>

                                    <tr class="border">
                                        <td class="border p-2">LastName</td>
                                        <td class="border p-2"><?php echo $row['surname'] ?></td>
                                    </tr>

                                    <tr class="border">
                                        <td class="border p-2">UserName</td>
                                        <td class="border p-2"><?php echo $row['username'] ?></td>
                                    </tr>

                                    <tr class="border">
                                        <td class="border p-2">Email</td>
                                        <td class="border p-2"><?php echo $row['email'] ?></td>
                                    </tr>

                                    <tr class="border">
                                        <td class="border">Number</td>
                                        <td class="border p-2"><?php echo $row['phone'] ?></td>
                                    </tr>

                                    <tr class="border">
                                        <td class="border p-2">Gender</td>
                                        <td class="border p-2"><?php echo $row['gender'] ?></td>
                                    </tr>

                                </table>

                            </div>
                            <div class="md:w-1/2 pr-4 pl-4">

                                <h1 class="text-3xl font-lg font-bold my-8">Change Username</h1>

                                <?php
                                if (isset($_POST['update'])) {
                                    $uname = $_POST['uname'];

                                    if (empty($uname)) {
                                        echo " <h5 class='relative block w-full p-4 text-base leading-5 text-white bg-red-500 rounded-lg opacity-100 mt-8'>Please Enter Username</h5>";
                                    } else {
                                        $query = "UPDATE patient SET username='$uname' WHERE username='$patient'";
                                        $res = mysqli_query($connect, $query);

                                        if ($res) {
                                            $_SESSION['patient'] = $uname;
                                        }
                                    }
                                }
                                ?>

                                <form method="post">
                                    <p class="text-2xl font-medium mt-2 mb-4">Enter Username</p>
                                    <input type="text" name="uname" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" autocomplete="off" placeholder="Enter Username">
                                    <input type="submit" name="update" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-teal-500 text-white hover:bg-teal-600" value="Update Username">
                                </form>


                                <?php

                                if (isset($_POST['change'])) {
                                    $old = $_POST['old_pass'];
                                    $new = $_POST['new_pass'];
                                    $con = $_POST['con_pass'];

                                    $q = "SELECT * FROM patient WHERE username='$patient'";

                                    $re = mysqli_query($connect, $q);
                                    $row = mysqli_fetch_array($re);

                                    if (empty($old)) {
                                        echo "<h5 class='relative block w-full p-4 text-base leading-5 text-white bg-red-600 rounded-lg opacity-100 mt-8'>Please Enter Old Password</h5>";
                                    } else if (empty($new)) {
                                        echo "<h5 class='relative block w-full p-4 text-base leading-5 text-white bg-red-600 rounded-lg opacity-100 mt-8'>Please Enter New Password</h5>";
                                    } else if ($con != $pass) {
                                        echo "<h5 class='relative block w-full p-4 text-base leading-5 text-white bg-red-600 rounded-lg opacity-100 mt-8'>Both Password Do Not Match</h5>";
                                    } else if ($old != $row['password']) {
                                        echo "<h5 class='relative block w-full p-4 text-base leading-5 text-white bg-red-600 rounded-lg opacity-100 mt-8'>Old password does not match</h5>";
                                    } else {
                                        $query = "UPDATE patient SET password = '$new' WHERE username='$patient' ";
                                        mysqli_query($connect, $query);
                                    }
                                }
                                ?>

                                <form method="post">
                                    <p class="text-3xl font-lg font-bold mt-4">Change Password</p>
                                    <div>

                                    </div>
                                    <div class="mb-4">
                                        <br>
                                        <label class="text-2xl font-semibold">Old Password</label>
                                        <input type="password" name="old_pass" class="block appearance-none w-full py-1 px-2 my-4 text-base leading-normal bg-white text-gray-800 border-2 border-gray-600 rounded" placeholder="Enter old password">
                                    </div>

                                    <div class="mb-4">
                                        <label class="text-2xl  font-medium">New Password</label><br>
                                        <input type="password" name="new_pass" class="block appearance-none w-full py-1 px-2 mt-4 text-base leading-normal bg-white text-gray-800 border-2 border-gray-600 rounded" placeholder="Enter New Password">
                                    </div>

                                    <div class="mb-4">
                                        <label class="text-2xl font-medium">Confirm New Password</label><br>
                                        <input type="password" name="con_pass" class="block appearance-none w-full py-1 px-2 mt-4 text-base leading-normal bg-white text-gray-800 border-2 border-gray-600 rounded" placeholder="Confirm New Password">
                                    </div>

                                    <input type="submit" name="change" value="Change Password" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-teal-500 text-white hover:bg-teal-600">
                                </form>

                            </div>
                        </div>
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