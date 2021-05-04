<?php 
include'header.php';
include'conn.php';
include'css/style.css';
?>
<body style="background-image: url('images/bg2.jpg');">
<div class="right">
<form name="reg" method="post">
<table>
        <tr>
            <td><h1>Registration</h1></td>
        </tr>
        <tr>
            <td><input name="uname" type="text" placeholder="Full Name" required></td>
        </tr>
        <tr>
            <td><input name="email" type="text" placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required></td>
        </tr>
        <tr>
            <td><input name="ph" type="text" placeholder="Phone Number" maxlength="10" required></td>
        </tr>
        <tr>
            <td><input name="address" type="text" placeholder="Address" required></td>
        </tr>
        <tr>
            <td><input name="dob" type="date" placeholder="Date of Birth" required></td>
        </tr>
        <tr>
            <td><input name="blood" type="text" placeholder="Blood Group" required></td>
        </tr>    
        <tr>
            <td><input name="pwd1" type="password" placeholder="Password" pattern=".{8,}" required>
            <p style="font-size:10px; color:green; text-align:left;">Hint:Password must contain atleast 8 characters</p></td>
            
        </tr>
        <tr>
            <td><input name="pwd2" type="password" placeholder="Re-type Password" pattern=".{8,}" required></td>
        </tr>
        <tr>
            <td>
            
<?php

if(isset($_POST['submit'])){
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $ph = $_POST['ph'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $blood = $_POST['blood'];
    $pwd1 = $_POST['pwd1'];
    $pwd2 = $_POST['pwd2'];
    
    $sql = "select email from registration where email ='$email' ";
    $results = $conn->query($sql);
    
    if($results){
        if($results->num_rows){
            echo '<p class="warn">Email ID already exists</p>';
        }else{
            if($pwd1 != $pwd2){
                echo '<p class="warn">Password doesnot match</p>';
            }else{
                $sql2 = "insert into registration(name,email,pwd,ph,address,dob,blood,approval,rank,role)values('$uname','$email','$pwd1','$ph','$address','$dob','$blood','n','Undefined','student')";
                $results2 = $conn->query($sql2);
                
                if($results2){
                    echo 'Registration Successful';
                }else{
                    echo 'Failed';
                }
            }
        }
    }
}

?>
            </td>
        </tr>
    
        <tr>
            <td><input name="submit" type="submit" value="Register"></td>
        </tr>
        
        </table>
    </form>
</div>
</body>