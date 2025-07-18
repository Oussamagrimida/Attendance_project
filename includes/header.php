<?php 
//This includes the session file. This file contains code that starts/resumes a session. 
//By having it in the header file, it will be included on every page, allowing session capability to be used on every page across the website.
include_once 'includes/session.php'?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link href="css/index.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">It Conference</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            <a class="nav-link" href="viewrecords.php">View Attendees</a>
          </div>
          <div class="d-flex ms-auto align-items-center">
            <?php 
            if(!isset($_SESSION['userid'])){
            ?>
              <a class="btn btn-outline-light me-2" href="login.php">Login</a>
            <?php } else{?>
              <span class="navbar-text text-white fw-normal me-3" style="font-family: inherit;">
                Hello, <strong><?php echo htmlspecialchars(ucfirst($_SESSION['username'])); ?></strong>
              </span>
              <a class="btn btn-outline-light me-2" href="logout.php">Logout</a>
             <?php }?>
            <button id="theme-toggle" class="btn btn-outline-light" type="button" aria-label="Toggle dark mode">
              <i id="theme-icon" class="bi"></i>
            </button>
          </div>
        </div>
      </div>
    </nav>
    <script>
      // Dark/Light mode toggle logic
      const body = document.body;
      const toggleBtn = document.getElementById('theme-toggle');
      const themeIcon = document.getElementById('theme-icon');
      function setTheme(mode) {
        if (mode === 'dark') {
          body.classList.add('dark-mode');
          themeIcon.classList.remove('bi-moon-fill');
          themeIcon.classList.add('bi-sun-fill');
        } else {
          body.classList.remove('dark-mode');
          themeIcon.classList.remove('bi-sun-fill');
          themeIcon.classList.add('bi-moon-fill');
        }
        localStorage.setItem('theme', mode);
      }
      // On load
      const savedTheme = localStorage.getItem('theme') || 'light';
      setTheme(savedTheme);
      toggleBtn.onclick = () => {
        const isDark = body.classList.contains('dark-mode');
        setTheme(isDark ? 'light' : 'dark');
      };
    </script>
    <br>
    <br>