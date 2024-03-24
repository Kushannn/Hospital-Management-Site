<?php

include("../include/connection.php");

$query = "SELECT * FROM doctors WHERE status='pending' ORDER BY data_reg ASC";
$res = mysqli_query($connect, $query);

$output = "";

$output .= "


<table class='w-full max-w-full mb-4 bg-transparent mt-10'>
    <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Surname</th>
        <th>Username</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>Speciality</th>
        <th>Date Registered</th>
        <th>Action</th>
    </tr>
    


";

if (mysqli_num_rows($res) < 1) {
    $output .= "
    <tr>
        <td colspan='10' class='text-center text-xl'> 
            No Job Requests Yet.
        </td>
    </tr>
    ";
}


while ($row = mysqli_fetch_array($res)) {
    $output .= "
    
        <tr>
        <td>" . $row['id'] . "</td>
        <td>" . $row['firstname'] . "</td>
        <td>" . $row['surname'] . "</td>
        <td>" . $row['username'] . "</td>
        <td>" . $row['email'] . "</td>
        <td>" . $row['gender'] . "</td>
        <td>" . $row['phone'] . "</td>
        <td>" . $row['speciality'] . "</td>
        <td>" . $row['data_reg'] . "</td>
        <td>
            <div class='md:w-full pr-4 pl-4'>
                <div class='flex flex-wrap'>
                   <div class=''md:w-1/2 pr-4 pl-4>
                        <button id='" . $row['id'] . "' class='inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:bg-green-600 approve'onClick>
                        Approve
                        </button>
                   </div> 
                    <div class=''md:w-1/2 pr-4 pl-4>
                    <button id='" . $row['id'] . "' class='inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-red-600 text-white hover:bg-red-700 reject'>
                        Reject
                    </button>
                   </div>
                </div>
            </div>
        </td>

    ";
}

$output .= "
    </tr>
    </table>
";

echo $output;
