<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Invoice</title>
</head>

<body class="overflow-hidden">

    <?php
    include("../include/header.php");
    include("../include/connection.php")
    ?>

    <div class="container max-w-full mx-auto sm:px-4">
        <div class="md:w-full pr-4 pl-4">
            <div class="flex flex-row">
                <div class="md:w-1/5 pr-4 pl-4 -ml-12">
                    <?php include("./patient_sidenav.php"); ?>
                </div>

                <div class="md:w-4/5 pr-4 pl-4">
                    <h1 class="my-5 font-bold text-4xl">View Invoice</h1>

                    <div class="md:w-full pr-4 pl-4">
                        <div class="flex flex-wrap">
                            <div class="md:w-1/4 pr-4 pl-4">

                            </div>

                            <div class="md:w-1/2 pr-4 pl-4">
                                <?php

                                if (isset($_GET['id'])) {

                                    $id = $_GET['id'];

                                    $query = "SELECT * FROM income WHERE id='$id'";
                                    $res = mysqli_query($connect, $query);

                                    $row = mysqli_fetch_array($res);
                                }

                                ?>

                                <table class="w-full max-w-full mb-4 bg-transparent">
                                    <tr class="border bg-blue-400 text-white">
                                        <th colspan="2" class="text-center p-4 text-lg font-bold">
                                            Invoice Details
                                        </th>
                                    </tr>

                                    <tr class="border">
                                        <td class="border p-4 text-lg font-semibold">Doctor</td>
                                        <td class="border p-4 font-medium"> <?php echo $row['doctor'] ?></td>
                                    </tr>

                                    <tr class="border">
                                        <td class="border p-4 text-lg font-semibold">Patient</td>
                                        <td class="border p-4 font-medium"> <?php echo $row['patient'] ?></td>
                                    </tr>

                                    <tr class="border">
                                        <td class="border p-4 text-lg font-semibold">Date Discharged</td>
                                        <td class="border p-4 font-medium"> <?php echo $row['date_discharge'] ?></td>
                                    </tr>

                                    <tr class="border">
                                        <td class="border p-4 text-lg font-semibold">Amount Paid</td>
                                        <td class="border p-4 font-medium"> <?php echo $row['amount_paid'] ?></td>
                                    </tr>

                                    <tr class="border">
                                        <td class="border p-4 text-lg font-semibold">Description</td>
                                        <td class="border p-4 font-medium"> <?php echo $row['description'] ?></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="md:w-1/4 pr-4 pl-4">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>