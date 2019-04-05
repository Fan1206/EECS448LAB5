<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "f994y556", "ooRaegu7", "f994y556");
$username = $_POST['username'];

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
//$query = "SELECT user_id FROM Users ";
$sql="INSERT INTO Users(user_id)
      VALUE ('$username')";
if($username==NULL){
    echo "Failed, Username cannot be empty.";
}
else
{
    if($mysqli->query($sql)==TRUE)
    {
        echo "Insert sucessufully";
    }
    else
    {
        echo "Insert failed, Username may already exists in database.";
    }
}
    echo "<br><br><div>
    <a href='CreateUser.html'>
    <button type='button'>Return Previous</button>
    </a></div>";
$mysqli->close();
?>
