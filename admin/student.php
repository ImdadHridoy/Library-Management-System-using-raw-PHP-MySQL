<?php
  include('../assets/layout/navbar.php');
  include ("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	
</head>
<style type="text/css">
.sec{
	height: 700px;
	width: 100%;
	background-color: #1bd6bc;
}
</style>
<body>
<section>
<div class="sec">
<div style="padding-top:130px; padding-left: 30px;">
  <a class="btn btn-primary" href="books.php">Books</a>
  <a class="btn btn-primary" href="request.php">Book Request</a>
  <a class="btn btn-primary" href="issue_information.php">Issue Information</a>
</div>
	
	
<div style="padding: 30px;">
<?php
if (isset($_SESSION['admin_login_user'])) {
	
	$sql="SELECT * FROM student";
		$res= mysqli_query($db,$sql);
			if(mysqli_num_rows($res)==0)
			{
				echo "Sorry! No student found with that username. Try searching again.";
			}
			else
			{  ?>	
				<table class='table table-bordered table-hover table-dark'>
					<thead style='background-color: #6db6b9e6'>
						<th> Roll</th>";
						<th> First Name</th>
						<th> Last Name</th>
						<th> Username </th>
						<th>Email</th>";
						<th> Contact"</th>
					</thead>
				
			<?php
			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				
				echo "<td>"; echo $row['id']; echo "</td>";
				echo "<td>"; echo $row['first']; echo "</td>";
				echo "<td>"; echo $row['last']; echo "</td>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['email']; echo "</td>";
				echo "<td>"; echo $row['contact']; echo "</td>";

				echo "</tr>";
			} ?>
		  </table>
		  <?php
		}

	
	}
	?>
	</div>
</div>
</section>
</body>
</html>
<?php 
include('../assets/layout/footer.php');
 ?>