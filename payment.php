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
            <td><h1>Payment</h1></td>
        </tr>
        <tr>
        <td>
            <?php
            $email = $_SESSION['email'];
            $sql = "select *from joinings group by course";
            $result = $conn->query($sql);
            $options = '';
                while($row = $result->fetch_assoc()){
                    $options = $options."<option value=$row[course]>$row[course]</option>";
                    }
            ?>
            <select name="course" onchange="getFee()">
            <option value="">Select Course</option>
                  <?php echo $options  ?>
            </select>
        </td>
        </tr>
                <tr>
        <td>
           <select name="month">
    <option value=''>--Select Month--</option>
    <option selected value='1'>Janaury</option>
    <option value='2'>February</option>
    <option value='3'>March</option>
    <option value='4'>April</option>
    <option value='5'>May</option>
    <option value='6'>June</option>
    <option value='7'>July</option>
    <option value='8'>August</option>
    <option value='9'>September</option>
    <option value='10'>October</option>
    <option value='11'>November</option>
    <option value='12'>December</option>
    </select> 
        </td>
        </tr>
              <tr>
        <td>
            <input name="year" type="number" min="0" placeholder="Year" pattern="[0-9]" required>
        </td>
        </tr>
        <tr>
        <td>
            <input id="fee" name="fee" type="number" min="0" placeholder="Fee" pattern="[0-9]" required>
        </td>
        </tr>
        <tr>
        <td>
            <input name="submit" type="submit" value="PAY">
        </td>
        </tr>
        <tr>
        <td>
        <?php
        if(isset($_POST['submit'])){
            $email = $_SESSION['email'];
            $course = $_POST['course'];
            $fee = $_POST['fee'];
            $month = $_POST['month'];
            $year = $_POST['year'];
            
            $sql2 =" insert into payment(email,course,amount,month,year)values('$email','$course','$fee','$month','$year')";
            $result = $conn->query($sql2);
            
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
        
        <th>Course</th>
        <th>Fee</th>
        <th>Month</th>
        <th>Year</th>
        </tr>
        <tr>
        <?php
            $email = $_SESSION['email'];
            $sql2= "select *from payment where email='$email'";
            $result2= $conn->query($sql2);
            if($result2){
            if($result2->num_rows > 0){
        while($row=$result2->fetch_assoc()){
   ?>
            <td><?php echo $row['course']; ?></td>
            <td><?php echo $row['amount']; ?></td>
            <td><?php echo $row['month']; ?></td>
            <td><?php echo $row['year']; ?></td>
            
            </tr>
    <?php            
        }
    }
            }
            

            
        ?>
    </table>    
        
        </div>


</body>