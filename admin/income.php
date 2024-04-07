<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Income</title>
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
                    include("./sidenav.php");
                    ?>
                </div>
                <div class="md:w-4/5 pr-4 pl-4">
                    <h1 class="my-5 font-bold text-4xl">Total Income</h1>

                    <?php
                    $query = "SELECT * FROM income";
                    $res = mysqli_query($connect, $query);
                    $output = "";
                    $output .= "
                        <table class='w-full max-w-full mb-4 bg-transparent'>
                            <tr class='border font-bold'>
                                <td class='border'>ID</td>
                                <td class='border'>Doctor</td>
                                <td class='border'>Patient</td>
                                <td class='border'>Date Discharged</td>
                                <td class='border'>Fee</td>
                    ";

                    if (mysqli_num_rows($res) < 1) {

                        $output .= "
                            <tr class='border'>
                                <td class='text-center' colspan='4'>No Patient Discharged Yet...</td>
                            </tr>
                        
                        ";
                    }

                    while ($row = mysqli_fetch_array($res)) {

                        $output .= "
                            <tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['doctor'] . "</td>
                                <td>" . $row['patient'] . "</td>
                                <td>" . $row['date_discharge'] . "</td>
                                <td>" . $row['amount_paid'] . "</td>
                        ";
                    }

                    $output .= " </tr> </table>";

                    echo $output;
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>