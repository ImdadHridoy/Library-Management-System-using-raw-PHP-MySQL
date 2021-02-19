	 <?php
  include "connection.php";
  include('../assets/layout/navbar.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">


.sec{
height: 700px;
width: 100%;
background-color: #1bd6bc;
}
.bt{
	padding-top: 100px;
	padding-left: 1000px;
}

</style>

</head>
<body>
	
<section>
<div class="sec">
<div class="bt">
	<a href="request.php" class="btn btn-primary">See Your Requested Books</a>
</div>

<div style="margin-left: 20px;">
<form method="post">

<input type="text" name="search" placeholder="search books.." required="">
<input type="submit" name="sub">

</form>
</div>


<?php
if (isset($_SESSION['login_user'])) {
if (isset($_GET["id"])) {
$id = htmlspecialchars($_GET["id"]);
echo $id;
$Parts = explode("/", $id);
$arr = $Parts;
echo $_SESSION['book_id'];

 $sql = "INSERT INTO issue_book (user_name,bid,approve,issue_date,return_date,apv_id) VALUES ('".$arr[0]."','".$arr[1]."','','','','2')";
	       if ($db->query($sql) === TRUE) {?>

	       	<script >
	       		alert('success');
	       	</script>
       <?php 
       	header("location: books.php");
		exit;
   }
       else{
       	echo "Not Inserted";
       }

		  

}
}
?>
	

	<h2 style="padding-left: 30px;color: white">List Of Books</h2>
	<?php
		//search



//end


		if(isset($_POST['sub']))
		{
			$res=mysqli_query($db,"SELECT * from books where name like '%$_POST[search]%' ");?>

		<div style="padding: 30px;">
		<table class="table table-bordered table-dark">
		<?php	echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "Department";  echo "</th>";
				echo "<th>"; echo "Request A Book";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>"; ?>
				
				  	 <td><a class="btn btn-primary" href="<?php echo $_SERVER['PHP_SELF'].'?id='.$_SESSION['login_user'].'/'.$row['bid']; ?>">Request</a></td>
				  	 <?php
				  	

				echo "</tr>";
			} ?>

		</table>
		</div> 
		<?php
			
		}
			/*if button is not pressed.*/
		else
		{
			
			$res=mysqli_query($db,"SELECT *from books order by books.name ASC"); ?>

		<div style="padding: 30px;">
		<table class="table table-bordered table-dark">
		<?php	echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "Department";  echo "</th>";
				echo "<th>"; echo "Request A Book";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>"; ?>
				
				  	 <td><a class="btn btn-primary" href="<?php echo $_SERVER['PHP_SELF'].'?id='.$_SESSION['login_user'].'/'.$row['bid']; ?>">Request</a></td>
				  	 <?php
				  	

				echo "</tr>";
			} ?>

		</table>
		</div>
		<?php }
		
	?>

</div>
</section>
</body>
<?php
include('../assets/layout/footer.php');
?>

