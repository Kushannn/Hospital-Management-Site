<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body class="font-mono">
    <?php
    include("../include/header.php");
    include("../include/connection.php")
    ?>

    <div class="container mx-auto sm:px-4 max-w-full ">
        <div class="md:w-full pr-4 pl-4 md:flex flex">
            <div class="flex flex-wrap">
                <div class="md:w-1/5 pr-4 pl-4 -ml-12">

                    <?php
                    include("sidenav.php");
                    ?>

                </div>
                <div class="md:w-4/5 md:pr-4 md:pl-4">
                    <h4 class="my-5 font-bold text-4xl">Admin Dashboard</h4>
                    <div class="md:w-full md:pr-4 md:pl-4 my-5">
                        <div class="flex flex-wrap ">
                            <div class="md:w-80 w-40 pr-4 pl-4 bg-[#41B3A3] md:h-64 mx-1 font-bold md:text-4xl text-xl my-2 font static transform transition duration-500 h-44 hover:scale-110">
                                <div class="grid grid-cols-2 gap-4">
                                    <a href="admin_main.php">
                                        <div>
                                            <?php
                                            $ad = mysqli_query(
                                                $connect,
                                                "SELECT * FROM admin"
                                            );
                                            $num = mysqli_num_rows($ad)
                                            ?>
                                            <h5 class=" pt-6 text-6xl"><?php echo $num;   ?></h5>
                                            <h5 class="pt-10">Total</h5>
                                            <h5>Admin</h5>
                                        </div>
                                    </a>
                                    <a href="admin_main.php">
                                        <div class="flex justify-center items-center">
                                            <img src="../images/admin.webp" alt="" class="pt-8">
                                        </div>
                                    </a>
                                </div>

                            </div>

                            <div class="md:w-80 w-40 pr-4 pl-4 bg-[#E8A87C] md:h-64 mx-1 font-bold md:text-4xl text-xl my-2 font static transform transition duration-500 h-44 hover:scale-110">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <h5 class=" pt-6 text-6xl">0</h5>
                                        <h5 class="pt-10">Total</h5>
                                        <h5>Doctor</h5>
                                    </div>
                                    <div class="flex justify-center items-center">
                                        <img src="../images/doctor.png" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="md:w-80 w-40 pr-4 pl-4 bg-[#C38D9E] md:h-64 mx-1 font-bold md:text-4xl text-xl my-2 font static transform transition duration-500 h-44 hover:scale-110">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <h5 class=" pt-6 text-6xl">0</h5>
                                        <h5 class="pt-10">Total</h5>
                                        <h5>Patient</h5>
                                    </div>
                                    <div class="flex justify-center items-center">
                                        <img src="../images/patient.png" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="md:w-80 w-40 pr-4 pl-4 bg-[#C38D9E] md:h-64 mx-1 font-bold md:text-4xl text-xl my-2 font static transform transition duration-500 h-44 hover:scale-110">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <h5 class=" pt-6 text-6xl">0</h5>
                                        <h5 class="pt-10">Total</h5>
                                        <h5>Report</h5>
                                    </div>
                                    <div class="flex justify-center items-center">
                                        <img src="../images/report.jpeg" alt="image here" class="mix-blend-darken">
                                    </div>
                                </div>
                            </div>

                            <div class="md:w-80 w-40 pr-4 pl-4 bg-[#E8A87C] md:h-64 mx-1 font-bold md:text-4xl text-xl my-2 font static transform transition duration-500 h-44 hover:scale-110">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <h5 class=" pt-6 text-6xl">0</h5>
                                        <h5 class="pt-10">Total</h5>
                                        <h5>Job Request</h5>
                                    </div>
                                    <div class="flex justify-center items-center">
                                        <img src="../images/job.png" alt="image here" class="mix-blend-darken">
                                    </div>
                                </div>
                            </div>

                            <div class="md:w-80 w-40 pr-4 pl-4 bg-[#41B3A3] md:h-64 mx-1 font-bold md:text-4xl text-xl my-2 font static transform transition duration-500 h-44 hover:scale-110">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <h5 class=" pt-6 text-6xl">0</h5>
                                        <h5 class="pt-10">Total</h5>
                                        <h5>Income</h5>
                                    </div>
                                    <div class="flex justify-center items-center">
                                        <img src="../images/income.png" alt="image here" class="mix-blend-darken">
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