<?php
ob_start();
include 'conn.php';
include 'header.php';
include 'css/style.css';
include 'css/admin.css';
?>


<body>

    <div class="center">
        
        <table width="1000px;" id="table">
    <tr>
        <th>ID</th>
        <th>Course</th>
        <th>Fee</th>
        <th>Video</th>
        <th>Approve</th>
        </tr>
        <tr>
        <?php
            $sql2= "select *from courses";
            $result2= $conn->query($sql2);
            if($result2){
            if($result2->num_rows > 0){
        while($row=$result2->fetch_assoc()){
   ?>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['courses']; ?></td>
            <td><?php echo $row['fee']; ?></td>
                <form action="video.php" method="post"> <td>
			<input id="form-button" name='action' type='submit' value='Video'>
			<input type='hidden' name='action' value="<?php echo $row['id'];?>">
                    </td>        
		</form>
            <td>
            <form method="post">
                <input id="form-button" name='join' type='submit' value='Join'>
			<input type='hidden' name='join' value="<?php echo $row['courses'];?>">

                </form>
            </td>
            
            </tr>
    <?php            
        }
    }
            }
            

            
        ?>
    </table>    
        
        </div>
                <?php
                    if(isset($_POST['join'])){
                        $email =$_SESSION['email'];
                        $id = $_POST['join'];
                        $sql3 = "insert into joinings(email,course)values('$email','$id')";
                        $result3 = $conn->query($sql3);
                        if($result3){
                            echo 'Joined';
                        }
                        
                    }
                ?>

</body>