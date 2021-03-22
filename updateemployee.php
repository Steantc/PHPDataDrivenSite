<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Employee</title>
</head>

<body>
	<h2>Update an Employee Record</h2>
	<br><br>
	<?php
		echo "<h3>PHP Code Generates This:</h3>";
		
		//some variables
		$servername = "localhost";  //mysql is on the same host as apache (not realistic but whatevs)
		$username = "steantc";    //username for database
		$password = "g]Moy{LE";		//password for the user
		$dbname = "employees";  	//which db you're going to use
	
		//this is the php object oriented style of creating a mysql connection
		$conn = new mysqli($servername, $username, $password, $dbname);  
	
		//check for connection success
		if ($conn->connect_error) {
			die("MySQL Connection Failed: " . $conn->connect_error);
		}
		echo "MySQL Connection Succeeded<br><br>";
		
		//pull the attribute that was passed with the html form GET request and put into a local variable.
		$last_name = $_GET["last_name"];
		$first_name = $_GET["first_name"];
		$emp_no = $_GET["emp_no"];
		$gender = $_GET["gender"];
		$hire_date = $_GET["hire_date"];
		$birth_date = $_GET["birth_date"];
		echo "Updating record for: " . $first_name . " " . $last_name;
	
		echo "<br><br>";
		
		//create the SQL insert statement, notice the funky string concat at the end to variablize the query
		//based on using the GET attribute
		//this statement needs to be variablized to put in the data passed from the form
		//right now it is hardcoded.
		$sql = "UPDATE employees SET emp_no = $emp_no, birth_date = '$birth_date', first_name =  '$first_name', last_name =  '$last_name', gender =  '$gender', hire_date =  '$hire_date' WHERE emp_no = $emp_no";
	
	
		if ($conn->query($sql) === TRUE){
			
			echo  "Employee Updated Successfully";
			
		} else {
		
			echo "Error: " . $sql . "<br>" . $conn->error;
			
		}
		
		//always close the DB connections, don't leave 'em hanging
		$conn->close();
		
	?>
</body>
</html>
