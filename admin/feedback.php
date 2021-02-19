
<?php
  
  include('../assets/layout/navbar.php');
  include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>

  <title>Student Login</title>

<style type="text/css">

.sec{
height: 650px; 
width: 100%;
background-color: #1bd6bc;
}

.banner{
position: absolute;
top: 100px;
left: 400px;
background-color: #1192b9;
height: 500px;
width: 650px;
text-align: center;
color: white;
padding-top: 30px;
opacity: 1
}
.img{
height: 650px; width: 100%;
}
.tbl{
	color: red;
}

</style>   
</head>
<body>


<section>
<div class="sec">
<div>
  <img class="img" src="../assets/img/admin.jpg">
</div>

<div class="banner card">

<form class="text-center p-5" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">

    <input class="form-control" type="text" name="comment" placeholder="@mention write something"><br>	
	<input class="btn btn-danger" type="submit" name="submit" value="Reply" style="width: 100px; height: 35px;">	

</form>

<?php

	if(isset($_POST['submit']))
	{

		
		$sql = "INSERT INTO comments (comment)
		VALUES ('$_POST[comment]');";
		if(mysqli_query($db,$sql))
		{
			$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
			$res=mysqli_query($db,$q);
			


			echo "<table class='table table-bordered'>";
			while ($row=mysqli_fetch_assoc($res)) 
			{
				echo "<tr>";
					echo "<td>"; echo $row['comment']; echo "</td>";
				echo "</tr>";
			}
			$res -> close();
		}

	}

	else {

		$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC"; 
			$res=mysqli_query($db,$q);

			echo "<table class='table table-bordered table-dark tbl'>";
			while ($row=mysqli_fetch_assoc($res)) 
			{
				echo "<tr>";
					echo "<td>"; echo $row['comment']; echo "</td>";
				echo "</tr>";
			} 

		}

			?>
			</table>


</div>
</div> 
</section>
</body>
</html>
<?php
include('../assets/layout/footer.php');
?>


