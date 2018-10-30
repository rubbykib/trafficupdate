

<!DOCTYPE html>
<html>
<head>
	<title>Traffic Updator</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>


<center>
		<h1>Traffic Update</h1>
		<p>Road Safety & awareness</p>
		<a href="addtraffic.php">Add Traffic update</a>
		





	</center>

  <h1 class="jumbotron">Add Traffic update</h1>
	<fieldset>
	<form action="" method="POST">
		<input type="text" name="Road_Name"
		placeholder="Enter Road name">
		<br>
		<br>
		<input type="text" name="Traffic_Info"
		placeholder="What's going on ?">
        <br>
		<br>
         

        <input type="submit" value="Update"class = "btn btn-info">



	
	</form>
	</fieldset>

</body>
</html>

<?php 
$conn = mysqli_connect("localhost", "root", "", "clinic_db");
	$response1= mysqli_query($conn, "SELECT * FROM table_traffic ORDER BY time DESC");

		while ($row = mysqli_fetch_array($response1)){
			echo "<i class= 'text-muted'> $row[0]</i>";
			echo "<p class='alert alert-warning'> $row[1]</p>";
			echo "<b class= 'badge badge-secondary'> $row[2]</b>";
			echo "<hr>";
				
			}//end while

//This is the logic:provide construct with form values
if (empty($_POST)){
	exit();//quit executing PHP code until, forrm button is clicked
}

$object = new Traffic($_POST['Road_Name'],
	                  $_POST['Traffic_Info'] );


$object->save(); //trigger save function


class Traffic{
	function __construct($Road_Name, $Traffic_Info){



		$this->Road_Name= $Road_Name;
		$this->Traffic_Info= $Traffic_Info;
	




	}//end constructor



	function save(){
		//connect to your database
		$conn =mysqli_connect("localhost","root", "","clinic_db");
		//save to table
		$response=mysqli_query($conn, "INSERT INTO `table_traffic`(`Road_Name`, `Traffic_Info`) VALUES ('$this->Road_Name','$this->Traffic_Info')");


		if ($response==true){
			echo "Successfully saved record";
		}
        
        else{
        	echo "Record Failed, check your Details";
        }
		
	
        


	}//end


}

?>

