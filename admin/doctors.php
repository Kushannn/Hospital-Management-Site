<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Doctors</title>
</head>

<body class="font-poppins overflow-hidden">

    <?php
    include("../include/connection.php");
    include("../include/header.php")
    ?>

    <div class="container mx-auto sm:px-4 max-w-full">
        <div class="md:w-full pr-4 pl-4">
            <div class="flex flex-wrap ">
                <div class="md:w-1/5 pr-4 pl-4 -ml-12">
                    <?php
                    include("sidenav.php");
                    ?>
                </div>
                <div class="md:w-4/5 pr-4 pl-4">
                    <h1 class="text-center text-4xl font-bold my-6 underline ">Total Doctors</h1>
                    <?php

                    $query = "SELECT * FROM doctors WHERE status='Approved' ORDER BY data_reg ASC";

                    $res = mysqli_query($connect, $query);

                    $output = "";

                    $output .= "


                    <table class='w-full max-w-full mb-4 bg-transparent mt-10 text-md shadow-xl'>
                        <tr class='bg-blue-400 text-white'>
                            <th class='border p-2 text-lg'>ID</th>
                            <th class='border p-2 text-lg'>Firstname</th>
                            <th class='border p-2 text-lg'>Surname</th>
                            <th class='border p-2 text-lg'>Username</th>
                            <th class='border p-2 text-lg'>Email</th>
                            <th class='border p-2 text-lg'>Gender</th>
                            <th class='border p-2 text-lg'>Phone</th>
                            <th class='border p-2 text-lg'>Speciality</th>
                            <th class='border p-2 text-lg'>Salary</th>
                            <th class='border p-2 text-lg'>Date Registered</th>
                            <th class='border p-2 text-lg'>Action</th>
                        </tr>";

                    if (mysqli_num_rows($res) < 1) {
                        $output .= "
                         <tr>
                            <td colspan='10' class='text-center text-xl p-2'> 
                                 No Job Requests Yet.
                            </td>
                         </tr>";
                    }


                    while ($row = mysqli_fetch_array($res)) {
                        $output .= "
                            <tr>
                            <td class='border p-2 text-lg font-medium'>" . $row['id'] . "</td>
                            <td class='border p-2 text-lg font-medium'>" . $row['firstname'] . "</td>
                            <td class='border p-2 text-lg font-medium'>" . $row['surname'] . "</td>
                            <td class='border p-2 text-lg font-medium'>" . $row['username'] . "</td>
                            <td class='border p-2 text-lg font-medium'>" . $row['email'] . "</td>
                            <td class='border p-2 text-lg font-medium'>" . $row['gender'] . "</td>
                            <td class='border p-2 text-lg font-medium'>" . $row['phone'] . "</td>
                            <td class='border p-2 text-lg font-medium'>" . $row['speciality'] . "</td>
                            <td class='border p-2 text-lg font-medium'>" . $row['salary'] . "</td>
                            <td class='border p-2 text-lg font-medium'>" . $row['data_reg'] . "</td>
                            <td class='border p-2' colspan='2'>
                                <a href='edit.php?id=" . $row['id'] . "'>
                                    <button class='inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-teal-500 text-white hover:bg-teal-600 w-auto'>Edit</button>
                                </a>
                            </td>
                   </div>
                </div>
            </div>
        </td>

    ";
                    }

                    $output .= "
    </tr>
    </table>";

                    echo $output;
                    ?>

                </div>

</body>

</html>