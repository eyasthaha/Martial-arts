<?php
include 'conn.php';
include 'header.php';
include 'css/style.css';
include 'css/admin.css';
?>

<body class="user">
      <div class="sidenav">
  <a href="join.php">Staff Registration</a>
  <a href="view_payment.php">Payments</a>
  <a href="feedback.php">Feedback</a>
  <a href="courses.php">Courses</a>
  <a href="change_pwd.php">Change Password</a>

</div>
    
    <div class="right">
        <h2 class="center"> Students</h2>
    <table id="table">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>DOB</th>
        <th>Blood</th>
        <th>Rank</th>
        <th>Approval</th>
        <th>Action</th>
    </tr>  
        <?php
            $sql = "select * from registration where role='student' ";
        $result = $conn->query($sql);
        if($result){
            if($result->num_rows){
                while($row = $result->fetch_assoc()){
      
        ?>
    <tr>
      
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['ph'] ?></td>
        <td><?php echo $row['address'] ?></td>
        <td><?php echo $row['dob'] ?></td>
        <td><?php echo $row['blood'] ?></td>
        <td><?php echo $row['rank'] ?></td>
        <td><?php echo $row['approval'] ?></td>
        <td><form method="post">
			<input class="tablebtn" name='action' type='submit' value='Delete'>
			<input type='hidden' name='action' value="<?php echo $row['email'];
  
            if(isset($_POST['action'])){
                $email=$row['email'];
                $sql2 = "delete from registration where email='$email' ";
                $result2 = $conn->query($sql2);
                if($result2){
                    echo 'Deleted';
                }else{
                    echo 'Error';
                }
            }     
                    ?>
            ">
                    
               </form></td>    
                <?php                        
                
                }
            }
        }
        ?>
    </tr>    
    </table>        
    </div>
   
</body>