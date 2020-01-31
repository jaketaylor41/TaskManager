<?php

$servername = "gx97kbnhgjzh3efb.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$username = "jywzdhdgnw64mykz";
$password = "mapj2a8swag0lpkv";
$dbname = "zgsgeqqwdvbys6j6";

$errors = "";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])){
    $task = $_POST['task'];
    if(empty($task)){
        $errors = "Task must be entered";
    } else{
        $sql = "INSERT INTO tasks (task)
VALUES ('$task')";
        header('location: index.php');
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
}

// Delete task
if(isset($_GET['del_task'])){
    $id = $_GET['del_task'];
    mysqli_query($conn, "DELETE FROM tasks WHERE id=$id");
    header('location: index.php');
}


$tasks = mysqli_query($conn, "SELECT * FROM tasks");








$conn->close();




?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Task Manager Application</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

  </head>
  <body>
    <h1 style="text-align: center; padding-top:20px;">All Tasks</h1>
  <div style="text-align: center;">
  <a style="display: inline-block; padding-right: 20px;" href="index.php">Home</a>
  <a style="display: inline-block;" href="newTasks.php">View New Task</a>
  </div>
  
  <table id="task-table" class="table table-hover">

<thead class="blue white-text">
<tr>
<th>#</th>
<th>Task</th>
<th>Action</th>
</tr>

</thead>

<tbody>
<?php $i = 1;  while ($row = mysqli_fetch_array($tasks)){?>
		
				<tr>
				<td><?php echo $i;?></td>
				<td class="task"><?php echo $row['task'];?></td>
				<td class="delete"><a href="index.php?del_task=<?php echo $row['id'];?>">X</a></td>
			</tr>
		
		<?php $i++; }?>
	
		
		</tbody>
	
		
	
	</table>
  
  
  
  </body>
  
  </html>


