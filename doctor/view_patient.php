<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patient Details</title>
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
                    include('./doctor_sidenav.php');
                    ?>
                </div>
                <div class="md:w-4/5 pr-4 pl-4">
                    <h1 class="text-center my-3 font-bold text-4xl">View Patient Details</h1>

                    <?php
                    if (isset($_GET['id'])) {

                        $id = $_GET['id'];

                        $query = "SELECT * FROM patient WHERE id='$id'";
                        $res = mysqli_query($connect, $query);

                        $row = mysqli_fetch_array($res);
                    }
                    ?>

                    <div class="md:w-full pr-4 pl-4">
                        <div class="flex flex-wrap">
                            <div class="md:w-1/4 pr-4 pl-4">

                            </div>
                            <div class="md:w-1/2 pr-4 pl-4">

                                <?php

                                echo "<img src='../patient/img/" . $row['profile'] . "' alt='' class='md:w-full pr-4 pl-4 my-2' height='250px'>";
                                ?>

                                <table class="w-full max-w-full mb-4 bg-transparent">
                                    <tr class="border">
                                        <th class="text-center" colspan="2">Details</th>
                                    </tr>

                                    <tr class="border">
                                        <td class="border">FirstName</td>
                                        <td class="border"><?php echo $row['firstname']; ?> </td>
                                    </tr>

                                    <tr class="border">
                                        <td class="border">LastName</td>
                                        <td class="border"><?php echo $row['surname']; ?> </td>
                                    </tr>

                                    <tr class="border">
                                        <td class="border">Username</td>
                                        <td class="border"><?php echo $row['username']; ?> </td>
                                    </tr>

                                    <tr class="border">
                                        <td class="border">Email</td>
                                        <td class="border"><?php echo $row['email']; ?> </td>
                                    </tr>

                                    <tr class="border">
                                        <td class="border">Phone</td>
                                        <td class="border"><?php echo $row['phone']; ?> </td>
                                    </tr>

                                    <tr class="border">
                                        <td class="border">Gender</td>
                                        <td class="border"><?php echo $row['gender']; ?> </td>
                                    </tr>

                                    <tr class="border">
                                        <td class="border">Date Reg.</td>
                                        <td class="border"><?php echo $row['date_reg']; ?> </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</body>

</html>