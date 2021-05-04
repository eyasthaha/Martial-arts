<?php
ob_start();
include 'header.php';
include 'conn.php';
include 'css/style.css';
?>
<body style="background-image: url('images/bg2.jpg');">
<div class="right">

    <form method="post">
    
    <table>
    <tr>
       <td> <h1>Login</h1></td>
    </tr>
        <tr>
            <td><input type="text" name="email" placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required></td>
        </tr>
        <tr>
            <td><input type="password" name="pwd" placeholder="Password" pattern=".{8,}" required></td>
        </tr>
        <tr>
            <td><div id="warn-font">Don't have an account? <a  class="warn" href="register.php">Create new one</a></div></td>
        </tr>
        
    <tr><td></td></tr>
    <tr><td><input type="submit" name="submit" value="Login"></td></tr>
    </table>
        
    </form>

</div>

<?php
if(isset($_POST['submit'])){
    
    $email =  $_POST['email'];
    $pwd   = $_POST['pwd'];
    
    $sql = "select *from registration where email ='$email' && pwd = '$pwd'";

    $results = $conn->query($sql);
    if($results){
        if($results->num_rows){
            $row = $results->fetch_assoc();
            $role = $row['role'];
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            if($role == 'student'){
                header("Location: studenthome.php");
            }elseif($role == 'staff'){
                header("Location: staffhome.php");
            }elseif($role == 'admin'){
                header("Location: adminhome.php");
            }
        }
    }else{
       echo '<p class="warn">Invalid Credentials</p>';
    }
}   
?>
    
</body>