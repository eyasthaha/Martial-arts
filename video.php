<?php
include 'conn.php';
include 'css/style.css';
if(isset($_POST['action'])){

    $id = $_POST['action'];
    $sql = "select video from courses where id ='$id' "; 
    $result = $conn->query($sql);
    if($row= $result->fetch_assoc()){
        ?>
        <body class="user">
<video width="100%;" autoplay>
  <source src="videos/<?php echo $row['video'] ?>">
  Your browser does not support HTML video.
</video>

</body>
<?php
    }
}
?>
