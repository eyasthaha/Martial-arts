<?php
ob_start();
include 'header.php';
include 'conn.php';
include 'css/style.css';

?>
<html>

<body>
    <div class="center">
    <form method="post">
    
    <table>
    <tr>
       <td id="center"> <h1>Change Password</h1></td>
    </tr>
        <tr>
            <td><input type="password" name="pwdc" placeholder="Current Password" pattern=".{8,}" required></td>
        </tr>
        <tr>
            <td><input type="password" name="pwd1" placeholder="New Password" pattern=".{8,}" required></td>
        </tr>
        <tr>
            <td><input type="password" name="pwd2" placeholder=" Re-type New Password" pattern=".{8,}" required></td>
        </tr>
    <tr><td id="center"><input type="submit" name="submit" value="Confirm"></td></tr>
    </table>
        
    </form>
    </div>
    
<?php
        if(isset($_POST['submit'])){
            $uid = $_SESSION['email'];
            $pwdc = $_POST['pwdc'];
            $pwd1 = $_POST['pwd1'];
            $pwd2 = $_POST['pwd2'];
             $sql = "select pwd from registration where email ='$uid'";
            $result = $conn->query($sql);
            if($result){
                if($row = $result->fetch_assoc()){
                    if($pwdc == $row['pwd']){
                        if($pwd1 == $pwd2){
                            $sql2 = "update registration set pwd='$pwd1' where email ='$uid'";
                            $result2 = $conn->query($sql2);
                            if($result2){
                                echo 'Password changed';
                            }
                        }else{
                            echo 'new password not match';
                        }
                    }else{
                        echo 'incorrect password';
                    }  
                }
            }
        }
    ?>
    </body>



</html>