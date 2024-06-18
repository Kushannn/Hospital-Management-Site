<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor</title>
</head>

<body class="font-poppins">
    <?php
    include("../include/header.php");
    include("../include/connection.php");
    ?>

    <div class="container mx-auto sm:px-4 max-w-full">
        <div class="md:w-full pr-4 pl-4">
            <div class="flex flex-row">
                <div class="md:w-1/5 pr-4 pl-4 -ml-12">
                    <?php
                    include("sidenav.php");
                    ?>
                </div>
                <div class=" md:w-4/5 pr-4 pl-4">
                    <h1 class="text-center text-4xl font-bold my-6 underline">Edit Doctors</h1>

                    <?php

                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $query = "SELECT * FROM doctors WHERE id='$id'";
                        $res = mysqli_query($connect, $query);
                        $row = mysqli_fetch_array($res);
                    }

                    ?>
                    <div class="flex flex-wrap">
                        <div class="md:w-2/3 pr-4 pl-4">
                            <h1 class=" text-3xl font-bold my-6 underline">Doctor Details</h1>
                            <h1 class="text-xl my-2 "><b>ID :</b> <?php echo $row['id']; ?></h1>
                            <h1 class="text-xl my-4"><b>Firstname : </b><?php echo $row['firstname']; ?></h1>
                            <h1 class="text-xl my-4"><b>Lastname : </b><?php echo $row['surname']; ?></h1>
                            <h1 class="text-xl my-4"><b>Username : </b><?php echo $row['username']; ?></h1>
                            <h1 class="text-xl my-4"><b>Email : </b><?php echo $row['email']; ?></h1>
                            <h1 class="text-xl my-4"><b>Phone : +</b><?php echo $row['phone']; ?></h1>
                            <h1 class="text-xl my-4"><b>Gender : </b><?php echo $row['gender']; ?></h1>
                            <h1 class="text-xl my-4"><b>Speciality :</b> <?php echo $row['speciality']; ?></h1>
                            <h1 class="text-xl my-4"><b>Date Registered : </b><?php echo $row['data_reg']; ?></h1>
                            <h1 class="text-xl my-4"><b>Salary : ₹</b><?php echo $row['salary']; ?></h1>
                        </div>
                        <div class="md:w-1/3 pr-4 pl-4">
                            <h1 class="text-2xl font-bold my-6">Update Salary</h1>
                            <?php

                            if (isset($_POST['update'])) {
                                $salary = $_POST['salary'];

                                $q = "UPDATE doctors SET salary='$salary' WHERE id='$id'";
                                mysqli_query($connect, $q);
                            }

                            ?>
                            <form method="post">
                                <label class="text-lg font-semibold ">Enter Doctor's Salary</label>
                                <input type="number" name="salary" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded shadow-md" autocomplete="off" placeholder="Enter Salary" value="<?php echo $row['salary']; ?>">
                                <input type="submit" name="update" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-teal-500 text-white hover:bg-teal-600 my-6" value="Update Salary">

                            </form>
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