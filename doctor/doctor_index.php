<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Dashboard</title>
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
                    <div class="container mx-auto sm:px-4 max-w-full">
                        <h1 class="my-5 font-bold text-4xl">Doctor's Dashboard</h1>
                        <div class="md:w-full pr-4 pl-4">
                            <div class="flex flex-wrap">
                                <div class="md:w-80 w-40 pr-4 pl-4 bg-[#41B3A3] md:h-64 mx-3 font-bold md:text-4xl text-xl my-2 font static transform transition duration-500 h-44 hover:scale-110 rounded-lg text-white">
                                    <div class="grid grid-cols-2 gap-4">
                                        <a href="./doctor_profile.php">
                                            <div>
                                                <h5 class="pt-10">My</h5>
                                                <h5>Profile</h5>
                                            </div>
                                        </a>
                                        <a href="./doctor_profile.php">
                                            <div class="flex justify-center items-center">
                                                <img src="../images/sampleProfile.png" alt="" class="pt-8 mix-blend-darken h-32 w-auto">
                                            </div>
                                        </a>
                                    </div>

                                </div>

                                <div class="md:w-80 w-40 pr-4 pl-4 bg-[#E8A87C] md:h-64 mx-3 font-bold md:text-4xl text-xl my-2 font static transform transition duration-500 h-44 hover:scale-110 rounded-lg text-white">
                                    <div class="grid grid-cols-2 gap-4">
                                        <a href="./patient_total.php">
                                            <div>
                                                <?php
                                                $p = mysqli_query($connect, "SELECT * FROM patient");
                                                $pp = mysqli_num_rows($p);
                                                ?>
                                                <h5 class="pt-10"><?php echo $pp; ?></h5>
                                                <h5 class="pt-10">Total</h5>
                                                <h5>Patient</h5>
                                            </div>
                                        </a>
                                        <a href="./patient_total.php">
                                            <div class="flex justify-center items-center">
                                                <img src="../images/doctor_patient.png" alt="" class="pt-8 ">
                                            </div>
                                        </a>
                                    </div>

                                </div>

                                <div class="md:w-80 w-40 pr-4 pl-4 bg-[#C38D9E] md:h-64 mx-3 font-bold md:text-4xl text-xl my-2 font static transform transition duration-500 h-44 hover:scale-110 rounded-lg text-white">
                                    <div class="grid grid-cols-2 gap-4">
                                        <a href="./appointment.php">
                                            <div>
                                                <?php
                                                $ap = mysqli_query($connect, "SELECT * FROM appointment WHERE status='Pending'");
                                                $appoint = mysqli_num_rows($ap);

                                                ?>
                                                <h5 class="pt-10"><?php echo $appoint; ?></h5>
                                                <h5 class="pt-10">Total</h5>
                                                <h5>Appointment's</h5>
                                            </div>
                                        </a>
                                        <a href="./appointment.php">
                                            <div class="flex justify-center items-center">
                                                <img src="../images/appointment1.jpeg" alt="" class="pt-8 mix-blend-darken">
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</body>

</html>