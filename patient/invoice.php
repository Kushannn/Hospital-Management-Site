<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Invoice</title>
</head>

<body>

    <?php
    include("../include/header.php");
    include("../include/connection.php");
    ?>

    <div class="container max-w-full mx-auto sm:px-4">
        <div class="md:w-full pr-4 pl-4">
            <div class="flex flex-row">
                <div class="md:w-1/5 pr-4 pl-4 -ml-12">
                    <?php include("./patient_sidenav.php"); ?>
                </div>

                <div class="md:w-4/5 pr-4 pl-4">
                    <h1 class="my-5 font-bold text-4xl">My Invoice</h1>

                    <?php
                    $pat = $_SESSION['patient'];

                    $query = "SELECT * FROM patient WHERE username='$pat' ";
                    $res = mysqli_query($connect, $query);

                    $row = mysqli_fetch_array($res);

                    $fname = $row['firstname'];

                    $querys = mysqli_query($connect, "SELECT * FROM income WHERE patient = '$fname'");

                    $output = "";

                    $output .= "
                        <table class='w-full max-w-full mb-4 bg-transparent'>
                            <tr class='border font-bold text-lg'>
                                <td class='border'>ID</td>
                                <td class='border'>Doctor</td>
                                <td class='border'>Patient</td>
                                <td class='border'>Date Discharge</td>
                                <td class='border'>Amount Paid</td>
                                <td class='border'>Description</td>
                            </tr>
                    ";

                    if (mysqli_num_rows($querys) < 1) {

                        $output .= "
                            <tr class='border'>
                                <td class='text-center' colspan='10'>No Invoice Yet...</td>
                            </tr>
                        
                        ";
                    }

                    while ($row = mysqli_fetch_array($querys)) {

                        $output .= "
                            <tr class='border'>
                                <td class='border'>" . $row['id'] . "</td>
                                <td class='border'>" . $row['doctor'] . "</td>
                                <td class='border'>" . $row['patient'] . "</td>
                                <td class='border'>" . $row['date_discharge'] . "</td>
                                <td class='border'>" . $row['amount_paid'] . "</td>
                                <td class='border'>" . $row['description'] . "</td>
                                <td class='border'>
                                    <a href='./view_invoice.php?id=" . $row['id'] . "'>
                                        <button class='inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-teal-500 text-white hover:bg-teal-600'>View</button>
                                    </a>
                                </td>
                            </tr>
                        ";
                    }

                    $output .= "
                        </tr>
                        </table>";

                    echo $output;
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>