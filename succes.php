<?php $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    require_once 'sendmail.php'; 
    
    if(isset($_POST['submit'])){
        //extract values from the $_POST
        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $dob=$_POST['dob'];
        $email=$_POST['email'];
        $contact=$_POST['phone'];
        $specialty=$_POST['speciality'];

        //call function to insert and track if succes or not
        $isSuccess=$crud->insertAttendees($fname, $lname, $dob, $email,$contact,$specialty);

        if($isSuccess){
            Sendmail::SendMail($email , 'Welcome to It Conference' , 'You have successfully registred for this year ' );
            include "includes/successmessage.php";
                                                                                                
        }else{
            include "includes/errormessage.php";
            header("Location: viewrecords.php");

        }
    } 
?>

<!--<h1 class="text-center text-success mt-5 mb-5">Registration Successful</h1>-->
<div class="container d-flex justify-content-center">
    <div class="card shadow-lg" style="max-width: 500px; width: 100%;">
        <div class="card-header bg-primary text-white text-center">
            <h4>User Information</h4>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <?php if (!empty($_POST['firstname']) || !empty($_POST['lastname'])): ?>
                    <li class="list-group-item"><strong>Name:</strong> <?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?></li>
                <?php endif; ?>
                <?php if (!empty($_POST['speciality'])): ?>
                    <li class="list-group-item"><strong>Speciality:</strong> <?php echo $_POST['speciality']; ?></li>
                <?php endif; ?>
                <?php if (!empty($_POST['email'])): ?>
                    <li class="list-group-item"><strong>Email:</strong> <?php echo $_POST['email']; ?></li>
                <?php endif; ?>
                <?php if (!empty($_POST['phone'])): ?>
                    <li class="list-group-item"><strong>Phone:</strong> <?php echo $_POST['phone']; ?></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>

<?php
    require_once 'includes/footer.php'; 
?>