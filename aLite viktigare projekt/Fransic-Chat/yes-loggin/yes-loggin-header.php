<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

</head>

<body>

  <nav class="navbar bg-body-tertiary navbar-box-holder">
    <div class="container-fluid navbar-box">
      <a class="navbar-brand image-and-text-holder " href="welcome.php">
        
        <img src="bilder/1-1.png" alt="Logo" class="d-inline-block align-text-top image-class ">
        <p> Fransic Chat </p>
      </a>
      <div class="mydropdown">
        <img class="prof-image" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
          aria-expanded="false" src="<?php echo $headerimagePath ?: 'bilder/no-user-image.png';?>" alt='image'>
        </a>
        <ul class="dropdown-menu  my-change"> 
          <li><a class="dropdown-item " href="my-profile.php">My Profile </a></li>
          <li><a class="dropdown-item " href="welcome.php">Start</a></li>
          <li><a class="dropdown-item " href="cube/start.html">Betyg!!</a></li>
          <?php if($_SESSION['adminbool'] == "1"){
            echo "<li><a class='dropdown-item' href='adminwelcome.php'>Admin!!</a></li>";
          } ?>

          <li>
            <form method="post" action="">
              <button type="submit" name="loggout-btn" class="dropdown-item">Logga ut</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>

</body>

</html>