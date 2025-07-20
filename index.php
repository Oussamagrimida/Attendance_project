
    <?php $title = 'Home';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results= $crud->getSpeciality();

    ?>

    <div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-md-7 col-lg-6">
      <div class="card p-4 shadow-sm">
        <h2 class="text-center mb-4">Registration for IT Conference</h2>
        <form method="post" action="succes.php">
          <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname">
          </div>
          <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname">
          </div>
          <div class="mb-3">
            <label for="dob" class="form-label">Date OF Birth</label>
            <input type="text" class="form-control" id="dob" name="dob">
          </div>
          <div class="mb-3">
            <label for="speciality" class="form-label">Area of Expertise</label>
            <select class="form-select" name="speciality" aria-label="speciality">
              <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){?>
                  <option value="<?php echo $r['speciality_id']; ?>"><?php echo $r["name"]; ?></option>
              <?php }?>
            </select>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
            <div id="phoneHelp" class="form-text">We'll never share your phone with anyone else.</div>
          </div>
          <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

    <?php
    require_once 'includes/footer.php'; ?>