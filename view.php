<?php $title = 'View Attendees';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    //Get attendee by id
    if(!isset($_GET['id'])){
        include "includes/errormessage.php";
        header("Location: viewrecords.php");
    }else{
       $id=$_GET['id'];
       $results=$crud->getAttendeesByid($id);
?>
<br>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg border-0" style="max-width: 500px; width: 100%;">
        <div class="card-header bg-primary text-white text-center">
            <div style="margin-bottom: 10px;">
                <svg width="48" height="48" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M13.468 12.37C12.758 11.226 11.482 10.5 10 10.5s-2.758.726-3.468 1.87A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                  <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm0 8A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                </svg>
            </div>
            <h4 class="mb-0">Attendee Details</h4>
        </div>
        <div class="card-body p-4">
            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item py-3"><strong>Name:</strong> <span class="text-secondary"><?php echo $results['firstname'] . ' ' . $results['lastname']; ?></span></li>
                <li class="list-group-item py-3"><strong>Speciality:</strong> <span class="text-secondary"><?php echo $results['name']; ?></span></li>
                <li class="list-group-item py-3"><strong>Email:</strong> <span class="text-secondary"><?php echo $results['email']; ?></span></li>
                <li class="list-group-item py-3"><strong>Phone:</strong> <span class="text-secondary"><?php echo $results['contactnumber']; ?></span></li>
            </ul>
            <div class="d-flex justify-content-center gap-2">
                <a href="viewrecords.php" class="btn btn-outline-primary px-4">Back to list</a>
                <a href="edit.php?id=<?php echo $results['attendee_id'] ?>" class="btn btn-outline-warning px-4">Edit</a>
                <a onclick=" return confirm('Are you sure !')" href="delete.php?id=<?php echo $results['attendee_id'] ?>" class="btn btn-outline-danger px-4">Delete</a>
            </div>
        </div>
    </div>
</div>
<?php }?>

<?php
    require_once 'includes/footer.php'; ?>