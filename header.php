<?php
session_start();
include'conn.php';
include'css/header.css';
?>
<html>
    
<body>
    <div class="header">
  <a href="index.php" class="logo">Martial Arts</a>
  <div class="header-right">
    <a class="active" href="index.php">Home</a>
      <div class="dropdown">
    <button class="dropbtn">Courses
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="karate.php">Karate</a>
      <a href="kungfu.php">Kung Fu</a>
      <a href="judo.php">Judo</a>
      <a href="taekwondo.php">Taekwondo</a>
      <a href="mixed.php">Mixed Martial Arts</a>
    </div>
  </div>    
    <?php
      if( isset($_SESSION['id']) && !empty($_SESSION['id']) ){
          $id = $_SESSION['id'];
          $sql = "select role from registration where id='$id'";
          $results= $conn->query($sql);
          if($results->num_rows){
             $row = $results->fetch_assoc();
              if($row['role'] == 'student'){
          ?>
      <a href="studenthome.php">Account</a>
      <?php }elseif($row['role'] == 'admin'){ ?>
      <a href="adminhome.php">Account</a>
      <?php }
              elseif($row['role'] == 'staff'){ ?>
      <a href="staffhome.php">Account</a>
      <?php } ?>
      <a style="background-color:#D32F2F;color:white;" href="logout.php">Logout</a>
          
    <?php } } else{ ?>
        <a href="#about">About</a>
            <a style="background-color:black;color:white;" href="login.php">Login</a>
      <?php } ?>

  </div>
</div>
    </body>
</html>