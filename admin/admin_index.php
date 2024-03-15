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
    include("../include/header.php")
    ?>

    <div class="container mx-auto sm:px-4 max-w-full mx-auto sm:px-4">
        <div class="md:w-full pr-4 pl-4">
            <div class="flex flex-wrap">
                <div class="md:w-1/5 pr-4 pl-4 -ml-12">

                    <?php
                    include("sidenav.php");
                    ?>

                </div>
                <div class="md:w-4/5 pr-4 pl-4"></div>
            </div>
        </div>

    </div>

</body>

</html>