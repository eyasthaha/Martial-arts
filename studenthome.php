<?php
include 'conn.php';
include 'header.php';
include 'css/style.css';
include 'css/admin.css';
?>

<body class="user">
    
<div class="center">
        <div id="profile" class="card">
    <?php
     $name = $_SESSION['name'];   
     $email = $_SESSION['email'];   

        $sql = "select * from joinings where email = '$email'";
        $result= $conn->query($sql);
        if($result){
            while($row = $result->fetch_assoc()){
                
            ?>
         <h2><?php echo $name; ?></h2>
        <h4><?php echo $row['email']; ?></h4>
        <div style="font-size:15px;">Current Course : <?php echo $row['course']; ?></div><br>
        <div style="font-size:15px;">Rank: <?php echo $row['course']; ?></div>
        <?php
            }
        }else{
            echo 'no courses';
        }
        
    ?>
    </div>
    </div>
    
    <div class="sidenav">
  <a href="join.php">Join</a>
  <a href="payment.php">Fee Payment</a>
  <a href="change_pwd.php">Change Password</a>

</div>
   
</body>