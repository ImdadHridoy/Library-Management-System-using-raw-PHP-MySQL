<?php
  
 
  include('../assets/layout/navbar.php');;
  include "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>

<style type="text/css">
.sec{
	height: 700px;
	width: 100%;
	background-color: #1bd6bc;
}

.con
{  
text-align: left;
position: absolute;
top: 100px;
left: 250px;
padding: 10px;
width:800px;
height: 500px;
background-color: black;
opacity: .8;
color: white: ;
}

.scroll
{
width: 100%;
height: 300px;
overflow: auto;
color: white;
}

</style>
</head>
<body>
<section>
<div class="sec">
<div class="con">
<h4>If you have any suggesions or questions please comment below.</h4>
<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
	<input class="form-control" type="text" name="comment" placeholder="Write something..."><br>	
	<input class="btn btn-success" type="submit" name="submit" value="comment" style="width: 100px; height: 35px;">		
</form>
	
<br><br>
<div class="scroll">
	<?php
		if(isset($_POST['submit']))
		{	
			$comment = $_POST['comment'];
			$sql = "INSERT INTO comments (comment) VALUES ('$comment')";
			$status = mysqli_query($db, $sql);
				
			if($status)
			{
				$q = "SELECT * FROM comments ORDER BY comments.`id` DESC";
				$res = mysqli_query($db,$q);

				while ($row = mysqli_fetch_assoc($res)) 
				{ ?>
					<table>
					<tr>
					<td> 
					<?php echo $row['comment']; ?>
					</td>
					</tr>
					</table>

				<?php

				}
			 }
			

		}

			else{
				$q = "SELECT * FROM `comments` ORDER BY `comments`.`id` DESC"; 
				$res = mysqli_query($db,$q);

				echo "<table class='table table-bordered'>";
				while ($row=mysqli_fetch_assoc($res)) 
				{
					echo "<tr>";
						echo "<td>"; echo $row['comment']; echo "</td>";
					echo "</tr>";
				}

			}
	?>
	</div>
	</div>
</div>
</section>
</body>
</html>
