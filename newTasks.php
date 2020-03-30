<?php 


require 'db_connector.php';
require __DIR__ . '/vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


$logger = new Logger('TaskManagerLogger');

$logger->pushHandler(new StreamHandler(__DIR__.'/app.log', Logger::DEBUG));

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
  
  <h1 style="text-align: center; padding-top:20px;">Most Recently Added Task</h1>
  <div style="text-align: center;">
  <a style="display: inline-block; padding-right: 20px;" href="index.php">Home</a>
  <a style="display: inline-block;" href="allTasks.php">View All Tasks</a>
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
			<?php $i = 1;  while ($row = mysqli_fetch_array($newTasks)){?>
		
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


