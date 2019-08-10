<?php
//including the database connection file
include_once("config.php");
 
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM names ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($DBConnect, "SELECT * FROM names"); // using mysqli_query instead
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
    <br/></br>
    <a href="add.html">Add New Name</a><br/><br/>
 
    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
		    <td>ID</td>
            <td>First Name</td>
            <td>Middle Initial</td>
            <td>Last Name</td>
            <td></td>
        </tr>
        <?php 
		
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_assoc($result)) {         
            echo "<tr>";
			echo "<td>".$res['count']."</td>";
            echo "<td>".$res['first']."</td>";
            echo "<td>".$res['MI']."</td>";
            echo "<td>".$res['last']."</td>";    
            echo "<td><a href=\"edit.php?id=$res[count]\">Edit</a> | <a href=\"delete.php?id=$res[count]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
    </table>
</body>
</html>