<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "f994y556", "ooRaegu7", "f994y556");
$authorid = $_POST['author'];
$content = $_POST['content'];
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$query = "SELECT * From Users WHERE user_id= '$authorid'  ";
if($authorid==NULL || $content==NULL){
    echo "Failed, author name or content cannot be empty.";
}

if($result=mysqli_query($mysqli,$query))
{
    if(mysqli_num_rows($result)>0)
    {
        $sql="INSERT INTO Posts (content, author_id)
        VALUE ('$content','$authorid')";
            if ($mysqli->query($sql) === TRUE)
            {
            echo "Post was successful.";
            }
    }
    else
    {
        echo "The User dose not exist.";
    }
   }  
   else
    {
        echo "ERROR. " ;
    }

    
    echo "<br><br><div>
    <a href='CreatePosts.html'>
    <button type='button'>Return Previous</button>
    </a></div>";
$mysqli->close();
?>
