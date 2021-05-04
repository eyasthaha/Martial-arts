<?php
include 'conn.php';
include 'header.php';
include 'css/style.css';
include 'css/admin.css';
?>

<body class="user">

    <form class="center">
        <h2 class="center">Feedback</h2>
    <table id="table">
    
        <tr>
            <th>Id</th>
            <th>E mail</th>
            <th>Message</th>
        </tr>
        <?php
            $sql = "select * from feedback";
        $result=$conn->query($sql);
        if($result){
           while($row = $result->fetch_assoc()){
               ?>
               <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['msg']; ?></td>
                </tr>
        <?php
           } 
        }
        ?>
        
    </table>
    </form>

</body>