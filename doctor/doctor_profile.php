<?php
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Profile</title>
</head>

<body>

    <?php
    include("../include/header.php");
    ?>

    <div class="container mx-auto sm:px-4 max-w-full">
        <div class="md:w-full pr-4 pl-4">
            <div class="flex flex-wrap">
                <div class="md:w-1/5 pr-4 pl-4 -ml-12">
                    <?php
                    include("doctor_sidenav.php");
                    include("../include/connection.php");
                    ?>
                </div>
                <div class="md:w-4/5 pr-4 pl-4">
                    <div class="container mx-auto sm:px-4 max-w-full">
                        <div class="md:w-full pr-4 pl-4">
                            <div class="flex flex-wrap">
                                <div class="md:w-1/2 pr-4 pl-4">
                                    <?php
                                    $doc = $_SESSION['doctor'];
                                    $query = "SELECT * FROM doctors WHERE username='$doc'";
                                    $res = mysqli_query($connect, $query);
                                    $row = mysqli_fetch_array($res);

                                    if (isset($_POST['upload'])) {
                                        $img = $_FILES['img']['name'];
                                        if (empty($img)) {
                                        } else {
                                            $query = "UPDATE doctors SET profile='$img' WHERE username='$doc'";
                                            $res = mysqli_query($connect, $query);

                                            if ($res) {
                                                move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
                                            }
                                        }
                                    }
                                    ?>

                                    <form method="post" enctype="multipart/form-data">
                                        <?php
                                        echo  "<img src='img/" . $row['profile'] . " ' class='md:w-full pr-4 pl-4 h-64 my-6' alt=''>";
                                        ?>
                                        <div class="mt-8 ">
                                            <label class="text-2xl font-lg font-bold">UPDATE PROFILE</label>
                                            <input type="file" name="img" class="block appearance-none w-full py-1 px-2 my-4 text-base leading-normal bg-white text-gray-800 border-2 border-gray-600 rounded">
                                        </div>
                                        <input type="submit" name="upload" value="Update" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-[#0D9276]  text-white hover:green-600" accept="image/png, image/jpeg">
                                    </form>

                                    <div class="my-8 ">
                                        <table class="border text-lg w-full max-w-full mb-4 bg-transparent">
                                            <tr class="border">
                                                <th class="text-center">Details</th>
                                            </tr>

                                            <tr class="border">
                                                <td class="border">Firstname</td>
                                                <td class="border"><?php echo $row['firstname']; ?></td>
                                            </tr>

                                            <tr class="border">
                                                <td class="border">Lastname</td>
                                                <td class="border"><?php echo $row['surname']; ?></td>
                                            </tr>

                                            <tr class="border">
                                                <td class="border">Username</td>
                                                <td class="border"><?php echo $row['username']; ?></td>
                                            </tr>

                                            <tr class="border">
                                                <td class="border">Email</td>
                                                <td class="border"><?php echo $row['email']; ?></td>
                                            </tr>

                                            <tr class="border">
                                                <td class="border">Phone Number</td>
                                                <td class="border"><?php echo $row['phone']; ?></td>
                                            </tr>

                                            <tr class="border">
                                                <td class="border">Gender</td>
                                                <td class="border"><?php echo $row['gender']; ?></td>
                                            </tr>

                                            <tr class="border">
                                                <td class="border">Speciality</td>
                                                <td class="border"><?php echo $row['speciality']; ?></td>
                                            </tr>

                                            <tr class="border">
                                                <td class="border">Salary</td>
                                                <td class="border"><?php echo $row['salary']; ?></td>
                                            </tr>

                                        </table>

                                    </div>

                                </div>
                                <div class="md:w-1/2 pr-4 pl-4">
                                    <?php
                                    if (isset($_POST['change_uname'])) {

                                        $uname = $_POST['uname'];
                                        if (empty($uname)) {
                                        } else {
                                            $query = "UPDATE doctors SET username='$uname' WHERE username='$doc'";

                                            $res = mysqli_query($connect, $query);
                                            if ($res) {
                                                $_SESSION['doctor'] = $uname;
                                            }
                                        }
                                    }
                                    ?>

                                    <form method="post">
                                        <h1 class="text-3xl font-lg font-bold my-8">Change Username</h1>
                                        <input type="text" name="uname" class="block appearance-none w-full py-1 px-2 my-6 text-base leading-normal bg-white text-gray-600 border-2 border-gray-700 rounded" autocomplete="off" placeholder="Enter New Username">
                                        <input type="submit" name="change_uname" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:green-600" value="Change Username">
                                    </form>

                                    <?php

                                    if (isset($_POST['change_pass'])) {

                                        $old = $_POST['old_pass'];
                                        $new = $_POST['new_pass'];
                                        $con = $_POST['con_pass'];

                                        $ol = "SELECT * FROM doctors WHERE username='$doc'";
                                        $ols = mysqli_query($connect, $ol);
                                        $row = mysqli_fetch_array($ols);

                                        if ($old != $row['password']) {
                                        } elseif (empty($new)) {
                                        } else if ($con != $new) {
                                        } else {
                                            $query = "UPDATE doctors SET password='$new' WHERE username='$doc'";
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

                                        <input type="submit" name="change_pass" value="Change Password" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:green-600">
                                    </form>
                                </div>

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