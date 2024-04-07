<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    include("./sidenav.php");
                    ?>
                </div>
                <div class="md:w-4/5 pr-4 pl-4">
                    <h1 class="my-5 font-bold text-4xl">Total Report's</h1>
                    <?php
                    $query = "SELECT * FROM report";
                    $res = mysqli_query($connect, $query);
                    $output = "";

                    $output .= "
                        <table class='w-full max-w-full mb-4 bg-transparent'>
                            <tr class='border'>
                                <td class='border'>ID</td>
                                <td class='border'>Title</td>
                                <td class='border'>Message</td>
                                <td class='border'>UserName</td>
                                <td class='border'>Date_send</td>
                            </tr>
                    ";

                    if (mysqli_num_rows($res) < 1) {

                        $output .= "
                            <tr class='border'>
                                <td class='text-center' colspan='6'>No Reports Yet...</td>
                            </tr>
                        
                        ";
                    }

                    while ($row = mysqli_fetch_array($res)) {

                        $output .= "
                            <tr class='border'>
                                <td class='border'>" . $row['id'] . "</td>
                                <td class='border'>" . $row['title'] . "</td>
                                <td class='border'>" . $row['message'] . "</td>
                                <td class='border'>" . $row['username'] . "</td>
                                <td class='border'>" . $row['date_send'] . "</td>
                                
                            </tr>
                        ";
                    }

                    $output .= "
                        </tr>
                        </table>";

                    echo $output;
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>