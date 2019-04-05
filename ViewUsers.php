<?php
    echo "<label>Users Table:</lable>";
$mysqli = new mysqli("mysql.eecs.ku.edu", "f994y556", "ooRaegu7", "f994y556");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$query= "SELECT user_id FROM Users";

if ($result = $mysqli->query($query)) {
    if(mysqli_num_rows($result)==0)
        {
          echo "<br>There is no user exits";
          echo "<br><br><div>
            <a href='AdminHome.html'>
            <button type='button'>Return Admin</button>
            </a></div>";
          exit();
        }
    /* fetch associative array */
    /*while ($row = $result->fetch_assoc()) {
        $cont = $cont+1;
        printf ("%s. %s\n",$cont,$row["user_id"]);
        echo "<br>";
    }*/
    echo "<table border=1 width = fit>";
    echo "<tr>
    <th>Num</th>
    <th>User</th>
    </tr>";
     $cont=0;
     while ($row = $result->fetch_assoc()) {
         $cont ++;
         echo "<tr><td>$cont</td>";
         echo "<td>". $row["user_id"];
         echo "</td></tr>";
     }

    /* free result set */
    $result->free();
}
    echo "</table>";
    
    echo "<br><br><div>
    <a href='AdminHome.html'>
    <button type='button'>Return Admin</button>
    </a></div>";

/* close connection */
$mysqli->close();
?>
