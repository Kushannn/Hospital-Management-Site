<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>

<body class="font-poppins">
    <?php
    include("../include/header.php");
    include("../include/connection.php");
    ?>

    <div class="container mx-auto sm:px-4 max-w-full">
        <div class="md:w-full pr-4 pl-4">
            <div class="flex flex-wrap ">
                <div class="md:w-1/4 pr-4 pl-4 -mx-12">
                    <?php
                    include("sidenav.php");
                    ?>
                </div>

                <div class="md:w-4/5 pr-4 pl-4">
                    <div class="md:w-full pr-4 pl-4">
                        <div class="flex flex-wrap">
                            <div class="md:w-1/2 pr-4 pl-4">
                                <h1 class="text-center text-2xl my-4 font-bold underline">
                                    All Admin
                                </h1>

                                <?php
                                $ad = $_SESSION['admin'];
                                $query = "SELECT * FROM admin WHERE username    !='$ad'";
                                $res = mysqli_query($connect, $query);
                                $output = "";
                                $output .= "
                                
                                   <table class='w-full max-w-full mb-4 bg-transparent border'>
                                   <tr>
                                    <th class='border'>Id</th>
                                    <th class='border'>Username</th>
                                    <th class='border w-1/4'>Action</th>
                                    </tr>
                                ";

                                if (mysqli_num_rows($res) < 1) {
                                    $output .= "<tr><td colspan='3' class='text-center'> No New Admin</td></tr>";
                                }
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $id = $row['id'];
                                    $username = $row['username'];
                                    $output .= "
                                    <tr class='border'>
                                        <td class='border'>$id</td>
                                        <td class='border'>$username</td>
                                        <td class='border'>
                                           <a href='admin_main.php?id=$row[id]' class='remove inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-red-600 text-white hover:bg-red-700'>Remove</a> 
                                        </td>                             
                                ";
                                }

                                $output .= "
                                   </tr>
                                   </table>
                                ";

                                echo $output;

                                // error_reporting(0);
                                // $idno = $_GET['id'];
                                // $query = "DELETE FROM admin WHERE id=$idno";
                                // $data = mysqli_query($connect, $query);



                                if (isset($_GET['id'])) {
                                    $idno = $_GET['id'];
                                    $query = "DELETE FROM admin WHERE id='$idno'";
                                    $data = mysqli_query($connect, $query);
                                }

                                ?>
                            </div>

                            <div class="md:w-1/2 pr-4 pl-4">
                                <?php
                                if (isset($_POST['add'])) {
                                    $uname = $_POST['uname'];
                                    $pass = $_POST['pass'];
                                    $image = $_FILES['img']['name'];

                                    $error = array();

                                    if (empty($uname)) {
                                        $error['u'] = "Enter Admin Username";
                                    } else if (empty($pass)) {
                                        $error['u'] = "Enter Admin Password";
                                    } else if (empty($image)) {
                                        $error['u'] = "Add Admin Image";
                                    }

                                    if (count($error) == 0) {
                                        $q = "INSERT INTO admin(username,password,profile) VALUES('$uname','$pass','$image')";

                                        $result = mysqli_query($connect, $q);

                                        if ($result) {
                                            move_uploaded_file($_FILES['img']['tmp_name'], "img/$image");
                                        } else {
                                        }
                                    }
                                }



                                if (isset($error['u'])) {
                                    $er = $error['u'];
                                    $show = "<h5 class='relative block w-full p-4 mb-4 text-base leading-5 text-white bg-red-500 rounded-lg opacity-100'>$er</h5>";
                                } else {
                                    $show = "";
                                }
                                ?>
                                <h1 class="text-center text-2xl my-4 font-bold underline">
                                    Add admin
                                </h1>
                                <form method="post" enctype="multipart/form-data">
                                    <div>
                                        <?php
                                        echo $show;
                                        ?>
                                    </div>
                                    <div class="mb-4">
                                        <label for="">Username</label>
                                        <input type="text" name="uname" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" autocomplete="off">
                                    </div>
                                    <div class="mb-4">
                                        <label for="">Password</label>
                                        <input type="password" name="pass" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded">
                                    </div>
                                    <div class="mb-4">
                                        <label for="">Add Admin Picture</label>
                                        <input type="file" name="img" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded cursor-pointer">
                                    </div>

                                    <input type="submit" name="add" value="Add New Admin" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:bg-green-600 cursor-pointer">
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