<?php
include 'header.php';
include 'css/home.css';
?>

<html>
    <body>
        <div class='first'>
            <h2 class="quote">“The more you sweat in training,<br> the less you bleed in combat”</h2>
            <div class="btn">
                <?php 
                if( isset($_SESSION['name']) && !empty($_SESSION['name']) ){

                }else{
                    ?>
                <a href="register.php">
                <button class="register-btn">REGISTER</button>
                </a>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="second">
                        <div class="img">
            <img src="images/3.png" height="573" width="650">
            </div>
            <div class="head"><h1>WHAT SKILLS <br> WILL YOU IMPROVE?</h1>
                <ul>
                <li>RAPIDITY</li>
                <li>REACTION</li>
                <li>IMPACT FORCE</li>
                <li>ENDURANCE</li>
                <li>TACTICS</li>
                <li>STRENGTH</li>
                </ul>
            </div>

        </div>
        <div id="about" class="about">
            <h2 style="text-align:center">About Us</h2>
            <p>Our programs have been specifically created for children, teens, and adults to work towards physical, mental, and total success. Not only will you or your child learn Olympic style Taekwondo, you will also gain knowledge to improve focus, confidence, self-esteem, and motivation. Our martial arts programs are intended to be a supplement to traditional education. While schools teach our children and teens wonderful academic and character curriculum, there is often a missing piece that is needed. This can be issues of self-worth, confidence, self-control, discipline, motivation, and physical fitness.</p>
        </div>
        <div class="center">
        <form method="post">
    <table>
        <tr>
            <td><h1 style="color:black;">Feeback</h1></td>
        </tr>
        <tr>
        <td>
            <input name="email" type="text" placeholder="E mail" required>
        </td>
        </tr>
        <tr>
        <td>
            <textarea name="msg" placeholder="Message"></textarea>
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
            $email = $_POST['email'];
            $msg = $_POST['msg'];

            $sql = "insert into feedback(email,msg)values('$email','$msg')";
            
            
            if($result = $conn->query($sql)){
                echo "<script>alert('sucess');</script>";
            }else{
                echo 'Something went wrong';
            }
        }
        ?>
        </td>
        </tr>

    </table>
    </form>
    </div>
    </body>
    <footer><div class="info">
        <h3>Martial Arts</h3>
        Contact no: 123456789<br>
        Email : example@gmail.com
        </div>
    </footer>
</html>