<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Appointments</title>
</head>

<body class="overflow-hidden">

    <?php
    include("../include/header.php");
    include("../include/connection.php");
    ?>

    <div class="container mx-auto sm:px-4 max-w-full">
        <div class="md:w-full pr-4 pl-4">
            <div class="flex flex-row">
                <div class="md:w-1/5 pr-4 pl-4 -ml-12">
                    <?php
                    include("doctor_sidenav.php");
                    ?>
                </div>

                <div class="md:w-4/5 pr-4 pl-4">
                    <h1 class="my-5 font-bold text-4xl">Total Appointments</h1>

                    <?php
                    $query = "SELECT * FROM appointment WHERE status='Pending'";
                    $res = mysqli_query($connect, $query);

                    $output = "";

                    $output .= "
                        <table class='w-full max-w-full mb-4 bg-transparent shadow-md text-lg font-medium'>
                            <tr class='border font-bold text-lg bg-blue-400'>
                                <th class='border p-2 text-lg'>ID</th>
                                <th class='border p-2 text-lg'>FirstName</th>
                                <th class='border p-2 text-lg'>LastName</th>
                                <th class='border p-2 text-lg'>Gender</th>
                                <th class='border p-2 text-lg'>Phone</th>
                                <th class='border p-2 text-lg'>Appointment Date</th>
                                <th class='border p-2 text-lg'>Symptoms</th>
                                <th class='border p-2 text-lg'>Date Booked</th>
                                <th class='border p-2 text-lg'>Action</th>
                            </tr>
                    ";

                    if (mysqli_num_rows($res) < 1) {

                        $output .= "
                            <tr class='border'>
                                <td class='text-center' colspan='8'>No Appointments Yet...</td>
                            </tr>
                        
                        ";
                    }

                    while ($row = mysqli_fetch_array($res)) {

                        $output .= "
                            <tr class='border'>
                                <td class='border p-2 text-lg font-medium'>" . $row['id'] . "</td>
                                <td class='border p-2 text-lg font-medium'>" . $row['firstname'] . "</td>
                                <td class='border p-2 text-lg font-medium'>" . $row['surname'] . "</td>
                                <td class='border p-2 text-lg font-medium'>" . $row['gender'] . "</td>
                                <td class='border p-2 text-lg font-medium'>" . $row['phone'] . "</td>
                                <td class='border p-2 text-lg font-medium'>" . $row['appointment_date'] . "</td>
                                <td class='border p-2 text-lg font-medium'>" . $row['symptoms'] . "</td>
                                <td class='border p-2 text-lg font-medium'>" . $row['date_booked'] . "</td>
                                <td class='border p-2 text-lg font-medium'>
                                    <a href='./discharge.php?id=" . $row['id'] . "'>
                                        <button class='inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-teal-500 text-white hover:bg-teal-600'>Check</button>
                                    </a>
                                </td>
                                
                            </tr>
                        ";
                    }

                    echo $output;

                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>