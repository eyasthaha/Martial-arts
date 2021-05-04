<?php
include 'conn.php';
include 'header.php';
include 'css/style.css';
include 'css/admin.css';
?>


<body>

<div style="padding:50px;">
    <form enctype="multipart/form-data" method="post">
    <table>
        <tr>
            <td><h1>Add Course</h1></td>
        </tr>
        <tr>
        <td>
            <input name="course" type="text" placeholder="Courses" required>
        </td>
        </tr>
        <tr>
        <td>
            <input name="fee" type="number" min="0" placeholder="Fee" pattern="[0-9]" required>
        </td>
        </tr>
        <tr>
        <td>
            <input name="video" type="file" min="0" required>
        </td>
        </tr>
        <tr>
        <td>
            <input name="submit" type="submit" value="submit">
        </td>
        </tr>
        <tr>
        <td>
        <?php
        if(isset($_POST['submit'])){
            $course = $_POST['course'];
            $fee = $_POST['fee'];
            $target = "videos/";
            $target = $target . basename( $_FILES['video']['name']) ; 
            if(move_uploaded_file($_FILES['video']['tmp_name'], $target)) 
             { 
             echo "The file ". basename( $_FILES['video']['name']). " has been uploaded"; 
                $video_path=$_FILES['video']['name'];
                   $sql = "insert into courses(courses,fee,video,approval)values('$course','$fee','$video_path','n')";
                    $result = $conn->query($sql);

                    if($result){
                        echo 'Course added';
                    }else{
                        echo 'Something went wrong';
                    }
             } 
             else 
             { 
             echo "Sorry, there was a problem uploading your file."; 
             } 

        }
        ?>
        </td>
        </tr>

    </table>
    </form>
    </div>
    
    <div class="right">
        
        <table width="500px;" id="table">
    <tr>
        <th>ID</th>
        <th>Course</th>
        <th>Fee</th>
        <th>Approval</th>
        <th>Action</th>
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
            <td><?php echo $row['approval']; ?></td>
                <form action="video.php" method="post"> <td>
			<input id="form-button" name='action' type='submit' value='Video'>
			<input type='hidden' name='action' value="<?php echo $row['id'];?>">
                    
		</form>
            </tr>
    <?php            
        }
    }
            }
            

            
        ?>
    </table>    
        
        </div>


</body>