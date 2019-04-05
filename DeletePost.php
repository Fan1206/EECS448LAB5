<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "f994y556", "ooRaegu7", "f994y556");
$choice = $_POST['choice'];

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

echo "<label style='font-size: 35px'>Posts Delete</label>";
if (count($choice)==0)
{
    echo"<p>Nothing was selected</p>";
}
else
{
 for($i=0; $i < count($choice);$i++)
 {
    $query = $mysqli->query("DELETE FROM Posts WHERE post_id='$choice[$i]'");
    echo "<p> Deleted Successfully , Post ID $choice[$i] was deleted.</p>";
 }
}
echo "<br><br><div>
<a href='DeletePost.html'>
<button type='button'>Return Previous</button>
</a></div>";

echo "<div>
  <a href='AdminHome.html'>
  <button>Return Admin</button>
  </a></div>";
$mysqli->close();
?>

