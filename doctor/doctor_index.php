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
                                <div class="md:w-1/4 pr-4 pl-2 bg-teal-500 h-48 my-6 rounded-lgmd:h-64 mx-1 font-bold md:text-3xl text-xl font static transform transition duration-500 hover:scale-110 rounded-lg">
                                    <div class="md:w-full pr-4 pl-4">
                                        <div class="flex flex-wrap">
                                            <div class="md:w-2/3 pr-4 pl-1 flex flex-wrap">
                                                <a href="doctor_profile.php" class="flex">
                                                    <h1 class="text-white my-4">My Profile</h1>
                                                </a>
                                            </div>

                                            <div class="md:w-1/3 pr-4 pl-4">
                                                <a href="doctor_profile.php"><img src="../images/sampleProfile.png" alt="" class="pt-8" height="90">
                                                </a>
                                            </div>


                                        </div>

                                    </div>
                                </div>

                                <div class="md:w-1/4 pr-4 pl-2 bg-teal-500 h-48 my-6 rounded-lgmd:h-64 mx-1 font-bold md:text-3xl text-xl font static transform transition duration-500 hover:scale-110 rounded-lg">
                                    <div class="md:w-full pr-4 pl-4">
                                        <div class="flex flex-wrap">
                                            <div class="md:w-2/3 pr-4 pl-1">
                                                <h1 class="text-white pt-8">0</h1>
                                                <h1 class="text-white">Total</h1>
                                                <h1 class="text-white">Patient's</h1>
                                            </div>
                                            <div class="md:w-1/3 pr-4 pl-4">
                                                <img src="../images/doctor_patient.png" alt="" class="pt-8" height="90">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="md:w-1/4 pr-4 pl-2 bg-teal-500 h-48 my-6 rounded-lgmd:h-64 mx-1 font-bold md:text-3xl text-xl font static transform transition duration-500 hover:scale-110 rounded-lg">
                                    <div class="md:w-full pr-4 pl-4">
                                        <div class="flex flex-wrap">
                                            <div class="md:w-2/3 pr-4 pl-1">
                                                <h1 class="text-white pt-8 pb-4">0</h1>
                                                <h1 class="text-white">Total</h1>
                                                <h1 class="text-white">Appointment's</h1>
                                            </div>
                                            <div class="md:w-1/3 pr-4 pl-4">
                                                <img src="../images/sampleProfile.png" alt="" class="pt-8">
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
    </div>
</body>

</html>