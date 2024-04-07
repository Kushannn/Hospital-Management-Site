<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Patient Appointment</title>
</head>

<body>

    <?php
    include("../include/header.php");
    include("../include/connection.php");
    ?>

    <div class="container mx-auto sm:px-4 max-w-full">
        <div class="md:w-full pr-4 pl-4">
            <div class="flex flex-wrap">
                <div class="md:w-1/5 pr-4 pl-4 -ml-12">
                    <?php
                    include("doctor_sidenav.php");
                    ?>
                </div>
                <div class="md:w-4/5 pr-4 pl-4">
                    <h1 class="my-5 font-bold text-4xl">Total Appointments</h1>

                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $query = "SELECT * FROM appointment WHERE id='$id'";
                        $res = mysqli_query($connect, $query);
                        $row = mysqli_fetch_array($res);
                    }
                    ?>

                    <div class="md:w-full pr-4 pl-4">
                        <div class="flex flex-row">
                            <div class="md:w-1/2 pr-4 pl-4">
                                <table class="text-lg font-medium">
                                    <tr class="border bg-blue-400 text-white">
                                        <td colspan="3" class="text-center text-xl font-semibold">
                                            Appointment Details
                                        </td>
                                    </tr>
                                    <tr class="border">
                                        <td class="border p-2">Firstname</td>
                                        <td class="p-2"><?php echo $row['firstname'] ?></td>
                                    </tr>

                                    <tr class="border bg-blue-200">
                                        <td class="border p-2">Lastname</td>
                                        <td class="p-2"><?php echo $row['surname'] ?></td>
                                    </tr>

                                    <tr class="border">
                                        <td class="border p-2">Gender</td>
                                        <td class="p-2"><?php echo $row['gender'] ?></td>
                                    </tr>

                                    <tr class="border bg-blue-200">
                                        <td class="border p-2">Phone No.</td>
                                        <td class="p-2"><?php echo $row['phone'] ?></td>
                                    </tr>

                                    <tr class="border">
                                        <td class="border p-2">Appointment Date</td>
                                        <td class="p-2"><?php echo $row['appointment_date'] ?></td>
                                    </tr>

                                    <tr class="border bg-blue-200">
                                        <td class="border p-2">Symptoms</td>
                                        <td class="p-2"><?php echo $row['symptoms'] ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="md:w-1/2 pr-4 pl-4">
                                <h1 class="text-center my-5 font-bold text-4xl">Invoice</h1>

                                <?php

                                if (isset($_POST['send'])) {
                                    $fee = $_POST['fee'];
                                    $des = $_POST['des'];

                                    if (empty($fee)) {
                                        echo "<p class='relative block w-full p-4 mb-4 text-base leading-5 text-white bg-red-500 rounded-lg opacity-100'>Please enter fee </p>";
                                    } else if (empty($des)) {
                                        echo "<p class='relative block w-full p-4 mb-4 text-base leading-5 text-white bg-red-500 rounded-lg opacity-100'>Please enter description </p>";
                                    } else {

                                        $doc = $_SESSION['doctor'];
                                        $fname = $row['firstname'];

                                        $query = "INSERT INTO income(doctor, patient, date_discharge, amount_paid, description) VALUES('$doc','$fname',NOW(),'$fee','$des')";

                                        $res = mysqli_query($connect, $query);

                                        if ($res) {
                                            echo "<p class='relative block w-full p-4 mb-4 text-base leading-5 text-white bg-green-500 rounded-lg opacity-100'>Your Invoice Has Been Sent </p>";

                                            mysqli_query($connect, "UPDATE appointment SET status='Discharged' WHERE id='$id'");
                                        }
                                    }
                                }

                                ?>

                                <form method="post">
                                    <label class="text-center my-5 font-bold text-xl">Fee</label>
                                    <input type="number" name="fee" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded my-2" autocomplete="off" placeholder="Enter Patient's Fee">

                                    <label class="text-center my-5 font-bold text-xl">Description</label>
                                    <input type="text" name="des" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded my-2" autocomplete="off" placeholder="Enter Description">

                                    <input type="submit" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-teal-500 text-white hover:bg-teal-600 my-2" value="Send" name="send">
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