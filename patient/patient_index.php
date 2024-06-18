<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
</head>

<body>
    <?php
    include('../include/header.php');
    include('../include/connection.php');
    ?>

    <div class="container mx-auto sm:px-4 max-w-full">
        <div class="md:w-full pr-4 pl-4">
            <div class="flex flex-wrap ">
                <div class="md:w-1/5 pr-4 pl-4 -ml-12 ">
                    <?php
                    include("patient_sidenav.php");
                    ?>
                </div>
                <div class="md:w-4/5 pr-4 pl-4">
                    <h1 class="my-5 font-bold text-4xl">Patient's Dashboard</h1>
                    <div class="md:w-full pr-4 pl-4">
                        <div class="flex flex-wrap ">


                            <div class="md:w-80 rounded-2xl w-40 pr-4 pl-4 bg-[#41B3A3] md:h-64 mx-1 font-bold md:text-4xl text-xl my-2 font static transform transition duration-500 h-44 hover:scale-110">
                                <div class="grid grid-cols-2 gap-4">
                                    <a href="./patient_profile.php">
                                        <div>
                                            <h5 class="pt-10">My</h5>
                                            <h5>Profile</h5>
                                        </div>
                                    </a>
                                    <a href="./patient_profile.php">
                                        <div class="flex justify-center items-center">
                                            <img src="../images/admin.webp" alt="" class="pt-8">
                                        </div>
                                    </a>
                                </div>

                            </div>

                            <div class="md:w-80 rounded-2xl w-40 pr-4 pl-4 bg-[#E8A87C] md:h-64 mx-1 font-bold md:text-3xl text-xl my-2 font static transform transition duration-500 h-44 hover:scale-110">
                                <div class="grid grid-cols-2 gap-4 ">
                                    <a href="./appointment.php">
                                        <div>
                                            <h5 class="pt-20">Book</h5>
                                            <h5>Your</h5>
                                            <h5>Appointment</h5>
                                        </div>
                                    </a>
                                    <a href="./appointment.php">
                                        <div class="flex justify-center items-center">
                                            <img src="../images/appointment.png" alt="" class="pt-6">
                                        </div>
                                    </a>
                                </div>

                            </div>

                            <div class="md:w-80 rounded-2xl w-40 pr-4 pl-4 bg-[#C38D9E] md:h-64 mx-1 font-bold md:text-4xl text-xl my-2 font static transform transition duration-500 h-44 hover:scale-110">
                                <div class="grid grid-cols-2 gap-4 ">
                                    <a href="./invoice.php">
                                        <div>
                                            <h5 class="pt-10">My</h5>
                                            <h5>Invoice</h5>
                                        </div>
                                    </a>
                                    <a href="./invoice.php">
                                        <div class="flex justify-center items-center">
                                            <img src="../images/invoice.jpeg" alt="" class="pt-8">
                                        </div>
                                    </a>
                                </div>

                            </div>



                        </div>
                    </div>

                    <?php
                    if (isset($_POST['send'])) {
                        $title = $_POST['title'];
                        $message = $_POST['message'];

                        if (empty($title)) {
                            echo "<h5 class='relative block w-full p-4 text-base leading-5 text-white bg-red-600 rounded-lg opacity-100 mt-8'>Your query has not been sent!</h5>";
                        } else if (empty($message)) {
                            echo "<h5 class='relative block w-full p-4 text-base leading-5 text-white bg-red-600 rounded-lg opacity-100 mt-8'>Your query has not been sent!</h5>";
                        } else {
                            $query = "INSERT INTO report(title,message,username,date_send) VALUES('$title','$message','$user',NOW())";
                            $res = mysqli_query($connect, $query);
                            if ($res) {
                                echo "<h5 class='relative block w-full p-4 text-base leading-5 text-white bg-green-500 rounded-lg opacity-100 mt-8'>Your query has been sent!</h5>";
                            }
                        }
                    }
                    ?>

                    <div class="md:w-4/5 pr-4 pl-4">
                        <div class="flex flex-wrap">
                            <div class="md:w-1/4 pr-4 pl-4"></div>
                            <div class="md:w-1/2 pr-4 pl-4 py-8 px-4 md:px-8 mb-8 rounded bg-[#41B3A3] my-8">
                                <h1 class="text-center text-3xl font-bold">Send A Report</h1>
                                <form method="post">
                                    <label class="text-center text-xl font-bold my-6">Title</label>
                                    <input type="text" name="title" autocomplete="off" class="block appearance-none w-full px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200  rounded-lg" placeholder="Enter the title of report">

                                    <label>Message</label>
                                    <input type="text" name="message" autocomplete="off" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" placeholder="Enter Message">

                                    <input type="submit" name="send" value="Send Report" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:green-600">
                                </form>
                            </div>
                            <div class="md:w-1/4 pr-4 pl-4"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>