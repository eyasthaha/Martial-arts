<?php
include 'conn.php';
include 'header.php';
include 'css/style.css';
include 'css/admin.css';
?>

<body class="user">

    <div class="center">
    <form method="post">
        <h2 class="center">Ranking</h2>
        <table>
            <tr>
            <td>
                <?php
                $sql = "select * from registration where role='student' && approval='y'";
                $result = $conn->query($sql);
                $options = '';
                while($row = $result->fetch_assoc()){
                    $options = $options."<option value=$row[email]>$row[email]</option>";
                    }
                ?>
                <select name="student">
                <option value="">Select Student</option>
                    <?php echo $options  ?>
                </select>    
            </td>
            </tr>
            <?php
                $sql2 = "select courses from courses";
                $result2 = $conn->query($sql2);
                $options2 = '';
                while($row = $result2->fetch_assoc()){
                    $options2 = $options2."<option value=$row[courses]>$row[courses]</option>";
                    }
                ?>
            <tr>
            <td>
                <select name="course">
                <option value="">Select Course</option>
                    <?php echo $options2  ?>
                </select>    
            </td>
            </tr>
            <tr>
            <td>
                <input type="text" name="rank" placeholder="Rank">    
            </td>
            </tr>
            <tr>
            <td>
                <input type="submit" name="submit" value="Submit">    
            </td>
            </tr>
            <tr>
            <td>
               <?php
                if(isset($_POST['submit'])){
                    $student =$_POST['student'];
                    $course =$_POST['course'];
                    $rank =$_POST['rank'];
                    
                    $sql3 = "update joinings set rank='$rank' where email='$student' && course ='$course'";
                    $result3 = $conn->query($sql3); 

                }
                ?>   
            </td>
            </tr>
        </table>    
    </form>
    </div>
    
</body>