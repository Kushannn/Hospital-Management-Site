<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>

<body class="box-border m-0 font-poppins">
    <!--sidebar-->
    <div class="flex flex-col pl-0 mb-0 border rounded border-gray-300 bg-blue-400 md:w-48 md:h-screen w-lvw">
        <a href="doctor_index.php" class="relative block py-3 px-6 -mb-px border border-r-0 border-l-0 border-gray-300 no-underline w-full bg-blue-400 text-white md:transform md:transition md:duration-500 md:hover:scale-110 md:h-16 md:text-lg transform transition duration-500 hover:scale-110 ">
            Dashboard
        </a>
        <a href="doctor_profile.php" class="relative block py-3 px-6 -mb-px border border-r-0 border-l-0 border-gray-300 no-underline w-full bg-blue-400 text-white md:transform md:transition md:duration-500 md:hover:scale-110 md:h-16 md:text-lg transform transition duration-500 hover:scale-110 ">
            Profile
        </a>
        <a href="admin.php" class="relative block py-3 px-6 -mb-px border border-r-0 border-l-0 border-gray-300 no-underline w-full bg-blue-400 text-white transform transition duration-500 hover:scale-110 h-16 text-lg  ">
            Patients
        </a>
        <a href="doctors.php" class="relative block py-3 px-6 -mb-px border border-r-0 border-l-0 border-gray-300 no-underline w-full bg-blue-400 text-white transform transition duration-500 hover:scale-110 h-16 text-lg">
            Appointments
        </a>
        <a href="" class="relative block py-3 px-6 -mb-px border border-r-0 border-l-0 border-gray-300 no-underline w-full bg-blue-400 text-white transform transition duration-500 hover:scale-110 h-16 text-lg">
            Reports
        </a>
    </div>
    <!--sidebar ends-->
</body>

</html>