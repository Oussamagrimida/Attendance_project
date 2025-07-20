<?php $title = 'View Attendees';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    //Get all attendees
    $results=$crud->getAttendees();
?>

<table class="table">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Speciality</th>
      <th scope="col">Actions</th>

    </tr>
    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){?>
    <tr>
        <td><?php echo $r['attendee_id'] ?></td>
        <td><?php echo $r['firstname'] ?></td>
        <td><?php echo $r['lastname'] ?></td>
        <td><?php echo $r['name'] ?></td>
        <td><a href="view.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-primary">View</a>
        <a href="edit.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-warning">Edit</a>
        <a onclick=" return confirm('Are you sure !')" href="delete.php?id=<?php echo $r['attendee_id'] ?>" class="btn btn-danger">Delete</a></td>

    </tr>
    <?php }?>
  
</table>



<?php
    require_once 'includes/footer.php'; ?>