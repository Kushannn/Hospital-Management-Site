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
                        <table class='w-full max-w-full mb-4 bg-transparent shadow-md'>
                            <tr class='border bg-blue-400 text-white'>
                                <th class='border p-2 text-lg'>ID</th>
                                <th class='border p-2 text-lg'>Title</th>
                                <th class='border p-2 text-lg'>Message</th>
                                <th class='border p-2 text-lg'>UserName</th>
                                <th class='border p-2 text-lg'>Date sent</th>
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
                                <td class='border p-3 font-medium text-lg'>" . $row['id'] . "</td>
                                <td class='border p-3 font-medium text-lg'>" . $row['title'] . "</td>
                                <td class='border p-3 font-medium text-lg'>" . $row['message'] . "</td>
                                <td class='border p-3 font-medium text-lg'>" . $row['username'] . "</td>
                                <td class='border p-3 font-medium text-lg'>" . $row['date_send'] . "</td>
                                
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