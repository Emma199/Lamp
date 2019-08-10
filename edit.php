<?php
// including the database connection file
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    $first=$_POST['first'];
    $MI=$_POST['MI'];
    $last=$_POST['last'];    
    
    // checking empty fields
    if(empty($first) || empty($MI) || empty($last)) {            
         echo "<font color='red'>You must enter all fields!</font><br/>";
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {    
        //updating the table
        $result = mysqli_query($DBConnect, "UPDATE names SET first='$first',MI='$MI',last='$last' WHERE count=$id");
        
        //redirectig to the display page. In our case, it is show.php
        header("Location: show.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($DBConnect, "SELECT * FROM names WHERE count=$id");
 
while($res = mysqli_fetch_assoc($result))
{
    $first = $res['first'];
    $MI = $res['MI'];
    $last = $res['last'];
}
?>
<html>
<head>    
    <title>Edit Name</title>
</head>
 
<body>
    <a href="show.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>First Name</td>
                <td><input type="text" name="first" value="<?php echo $first;?>"></td>
            </tr>
            <tr> 
                <td>Middle Name</td>
                <td><input type="text" name="MI" value="<?php echo $MI;?>"></td>
            </tr>
            <tr> 
                <td>Last Name</td>
                <td><input type="text" name="last" value="<?php echo $last;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>