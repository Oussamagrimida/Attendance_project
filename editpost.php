<?php 
     $title = 'Update Successful!';
    require_once 'includes/header.php';
    require_once 'db/conn.php'; 
    
    if(isset($_POST['submit'])){
        //extract values from the $_POST
        $id = $_POST['id'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['speciality'];

        //call function to insert and track if success or not
        $isSuccess = $crud->editAttendees($id, $fname, $lname, $dob, $email, $contact, $specialty);

        if($isSuccess){
            echo '<div class="card shadow-lg" style="max-width: 500px; margin: 40px auto; padding: 30px; border-radius: 10px; text-align: center;">
                <h2 style="color: #28a745; margin-bottom: 20px;">Update Successful!</h2>
                <div style="text-align: left; margin-bottom: 25px;">
                    <p><strong>First Name:</strong> ' . htmlspecialchars($fname) . '</p>
                    <p><strong>Last Name:</strong> ' . htmlspecialchars($lname) . '</p>
                    <p><strong>Date of Birth:</strong> ' . htmlspecialchars($dob) . '</p>
                    <p><strong>Email:</strong> ' . htmlspecialchars($email) . '</p>
                    <p><strong>Contact:</strong> ' . htmlspecialchars($contact) . '</p>
                    <p><strong>Specialty:</strong> ' . htmlspecialchars($specialty) . '</p>
                </div>
                <a href="index.php" style="display: inline-block; margin: 0 10px; padding: 10px 25px; background: #007bff; color: #fff; border-radius: 5px; text-decoration: none;">Home</a>
                <a href="viewrecords.php" style="display: inline-block; margin: 0 10px; padding: 10px 25px; background: #17a2b8; color: #fff; border-radius: 5px; text-decoration: none;">View All Records</a>
            </div>';
        } else {
            include "includes/errormessage.php";
        }
    } else {
        include "includes/errormessage.php";
    } 
?>