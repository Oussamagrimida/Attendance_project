
    <?php $title = 'Edit';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    $results= $crud->getSpeciality();

    if(!isset($_GET['id'])){
        include "includes/errormessage.php";
        header("Location: viewrecords.php");

    }else{
        $id=$_GET['id'];
        $attendee=$crud->getAttendeesByid($id);
    

    ?>

    <div class="container">
  <div class="row justify-content-center mt-6">
    <div class="col-md-8">
      <h2 class="text-center mb-4">Edit Record</h2>
      <form method="post" action="editpost.php">
        <input type="hidden" name="id" id="id" value="<?php echo $attendee['attendee_id']?>"/>
        <div class="mb-3">
          <label for="firstname" class="form-label">First Name</label>
          <input type="text" class="form-control" value="<?php echo $attendee['firstname'];?>" id="firstname" name="firstname">
        </div>
        <div class="mb-3">
          <label for="lastname" class="form-label">Last Name</label>
          <input type="text" class="form-control" value="<?php echo $attendee['lastname'];?>" id="lastname" name="lastname">
        </div>
        <div class="mb-3">
          <label for="dob" class="form-label">Date OF Birth</label>
          <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth'];?>" id="dob" name="dob">
        </div>
        <div class="mb-3">
          <label for="speciality" class="form-label">Area of Expertise</label>
          <select class="form-select" name="speciality" aria-label="speciality">
            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){?>
                <option value="<?php echo $r['speciality_id']; ?>" <?php if($r['speciality_id']==$attendee['speciality_id']) echo 'selected';?>>
                    <?php echo $r["name"]; ?>
                </option>
            <?php }?>
          </select>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" value="<?php echo $attendee['email'];?>" id="email" name="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Contact Number</label>
          <input type="text" class="form-control" value="<?php echo $attendee['contactnumber'];?>" id="phone" name="phone" aria-describedby="phoneHelp">
          <div id="phoneHelp" class="form-text">We'll never share your phone with anyone else.</div>
        </div>
        <a href="viewrecords.php" class="btn btn-default" >Back to List</a>
        <button type="submit" name="submit" class="btn btn-success w-75">Save changes</button>
      </form>

    </div>
  </div>
</div>
<?php }?>
    <?php
    require_once 'includes/footer.php'; ?>