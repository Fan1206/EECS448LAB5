<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "f994y556", "ooRaegu7", "f994y556");
$author = $_POST['choice'];

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = $mysqli->query("SELECT content FROM Posts WHERE author_id='$author'");
if($result= $query)
{
    echo"Author ($author) Posts";
    if(mysqli_num_rows($result)==0)
        {
          echo "<br>There is no post fot this user";
          echo "<br><br><div>
          <a href='ViewUserPosts.html'>
          <button type='button'>Return Previous</button>
          </a></div>";
          echo "<div>
            <a href='AdminHome.html'>
            <button type='button'>Return Admin</button>
            </a></div>";
          exit();
        }
    echo "<table border=1 width = 'fit'>";
    echo "<tr>
        <th>Posts</th>
         </tr>";
    /*echo "<tr>
        <th>Post ID</th>
        <th>Posts</th>
         </tr>";*/

         /*$query2 = "SELECT post_id FROM Posts WHERE author_id = '$author'";
         $result2 = $mysqli->query($query2);
         $row2= $result->fetch_assoc();*/

  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    /*<td>". $row2["post_id"];
    echo "</td>";*/
    echo  "<td>". $row["content"]; 
    echo "</td></tr>";

  }
  $result->free();

  

  echo "</table>";
  echo "<br><br><div>
  <a href='ViewUserPosts.html'>
  <button type='button'>Return Previous</button>
  </a></div>";
  echo "<div>
  <a href='AdminHome.html'>
  <button type='button'>Return Admin</button>
  </a></div>";
}
/* close connection */
$mysqli->close();
?>