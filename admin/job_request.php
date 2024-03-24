<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Request</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


</head>

<body>

    <?php
    include("../include/header.php")
    ?>

    <div class="container mx-auto sm:px-4 max-w-full">
        <div class="md:w-full pr-4 pl-4">
            <div class="flex flex-wrap ">
                <div class="md:w-1/5 pr-4 pl-4 -ml-12">
                    <?php
                    include('sidenav.php')
                    ?>
                </div>
                <div class="md:w-4/5 pr-4 pl-4">
                    <h1 class="text-center text-4xl font-bold my-6 underline ">Job Request</h1>
                    <div id="show"> </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {

            show();

            function show() {

                $.ajax({
                    url: "ajax_job_request.php",
                    method: "POST",
                    success: function(data) {
                        $("#show").html(data);
                    }
                })
            }

            $(document).on('click', '.approve', function() {

                let id = $(this).attr("id");



                $.ajax({
                    url: "ajax_approve.php",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        show();
                    }
                })
            });

            $(document).on('click', '.reject', function() {

                let id = $(this).attr("id");

                $.ajax({
                    url: "ajax_reject.php",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        show();
                    }
                })
            });

        });
    </script>

</body>

</html>