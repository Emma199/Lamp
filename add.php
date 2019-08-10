<html>
<head>
    <title>Add Name to My SQL DB</title>
</head>
 
<body>



<?php
//including the database connection file
include_once("config.php");
 
if(isset($_POST['Submit'])) {
    //Place user entered data into a PHP variable and strip the slashes    
    $first = stripslashes($_POST['first']);
    $MI = stripslashes($_POST['MI']);
    $last = stripslashes($_POST['last']);
        
    // checking empty fields from the HTML field
    if(empty($first) || empty($MI) || empty($last)) {                
       
        echo "<font color='red'>You must enter all fields!</font><br/>";
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
		//Error printed if connect is failed
	    if($DBConnect === false)
		echo"Unable to connect to DB Server."."ERROR code".
		mysqli_errno()." : " .mysqli_error();
			else{
			//if all the fields are filled (not empty)             
			//insert the data into the database
			$QueryResult = mysqli_query($DBConnect, "INSERT INTO names(first,MI,last) VALUES('$first','$MI','$last')");

			//Error message printed if query execution is failed
			if($QueryResult === false)
				
				printf("Error: %s\n", mysqli_error($DBConnect)) ;
			else
					//display success message
				echo "<font color='green'>Your data was stored in the database.";
				echo "<br/>";
				echo "<br/><a href='show.php'>View Result</a>";
			mysqli_close($DBConnect);
			
			}
	}
}
?>
</body>
</html>