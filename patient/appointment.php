<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book An Appointment</title>
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
                    include("./patient_sidenav.php");
                    ?>
                </div>
                <div class="md:w-4/5 pr-4 pl-4">
                    <h1 class="my-5 font-bold text-4xl">Book An Appointment!</h1>
                    <?php
                    $pat = $_SESSION['patient'];
                    $sel = mysqli_query($connect, "SELECT * FROM patient WHERE username='$pat'");
                    $row = mysqli_fetch_array($sel);

                    $firstname = $row['firstname'];
                    $surname = $row['surname'];
                    $gender = $row['gender'];
                    $phone = $row['phone'];

                    if (isset($_POST['book'])) {
                        $date = $_POST['date'];
                        $sym = $_POST['sym'];

                        if (empty($sym)) {
                            echo "<h5 class='relative block w-full p-4 text-base leading-5 text-white bg-red-600 rounded-lg opacity-100 mt-8'>Please Enter The Sympotms</h5>";
                        } else {
                            $query = "INSERT INTO appointment(firstname, surname, gender, phone, appointment_date, symptoms, status, date_booked) VALUES('$firstname','$surname','$gender','$phone','$date','$sym','Pending',NOW())";

                            $res = mysqli_query($connect, $query);

                            if ($res) {
                                echo "<h5 class='relative block w-full p-4 text-base leading-5 text-white bg-green-600 rounded-lg opacity-100 mt-8'>Your Appointment Is Booked!</h5>";
                            }
                        }
                    }
                    ?>
                    <div class="md:w-full pr-4 pl-4">
                        <div class="md:w-1/4 pr-4 pl-4">

                        </div>
                        <div class="md:w-1/2 pr-4 pl-4 py-8 px-4 md:py-16 md:px-8 mb-8 bg-gray-200 rounded ">
                            <form method="post">
                                <label class="my-5 font-bold text-xl"> Choose An Appointment Date</label>
                                <input type="date" name="date" class="block     appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded my-6">

                                <label class="font-bold text-xl mt-7">Symptoms</label>
                                <input type="text" name="sym" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded my-6">

                                <input type="submit" name="book" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-teal-500 text-white hover:bg-teal-600 my-2" value="Book Appointment">
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