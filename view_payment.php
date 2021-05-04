<?php
include 'conn.php';
include 'header.php';
include 'css/style.css';
include 'css/admin.css';
?>
<body>
    <div class="center">
        <h2 class="center">Payment List</h2>
    <form method="post">
<input type="text" name="search" placeholder="Search"><input name="submit" class="center" type="submit" value="Search">
    </form>
    </div>
    <div class="center">
               <table id="table">
           <tr>
           <th>E mail</th>
           <th>Course</th>
           <th>Amount</th>
           <th>Month</th>
           <th>Year</th>
           </tr>
        <?php
        if(isset($_POST['submit'])){
            $email = $_POST['search'];
        $sql = "select * from payment where email = '$email'";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
        ?>

           <tr>
           <td><?php echo $row['email']; ?></td>
           <td><?php echo $row['course']; ?></td>
           <td><?php echo $row['amount']; ?></td>
           <td><?php echo $row['month']; ?></td>
           <td><?php echo $row['year']; ?></td>
           </tr>
           <?php
            }
        }
            ?>
        </table>
    </div>

</body>