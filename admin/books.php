<?php
  include "connection.php";
  include('../assets/layout/navbar.php');
?>



<!DOCTYPE html>
<html>
<head>
	<title>Books</title>

<style type="text/css">
.form{
	padding: 5px;
}
.form input{
	padding: 10px;
}
.sidenav {
  height: 100%;
  background: powderblue;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 100;
  left: 500;
  height: 400px;
  width: 250px;	
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: white;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.cont {
position: absolute;
top: 20%;
left: 2%;
width: 1100px;	
height: 500px;

}
.tbl td{
	color: white;
}
.Option{
float: left;
margin-top: 100px;
}
.search
{
float: right;	
}
.sec{
	height: 700px;
	width: 100%;
	background-color: #1bd6bc;
}
</style>

</head>
<body>
	



<section>
<div class="sec">
<div class="cont col-md-12">

	<div class="search col-md-3">
	    

	<div id="mySidenav" class="sidenav">
  	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<input type="text" name="name" class="form-control" placeholder="Book Name" required="">
		<input type="text" name="authors" class="form-control" placeholder="Authors Name" required="">
		<input type="text" name="edition" class="form-control" placeholder="Edition" required="">
		<input type="text" name="status" class="form-control" placeholder="Status" required="">
		<input type="text" name="quantity" class="form-control" placeholder="Quantity" required="">
		<input type="text" name="department" class="form-control" placeholder="Department" required="">

		<input type="submit" name="addBook">

	</form>
	<?php
    if(isset($_POST['addBook']))
    {

       $sql = "INSERT INTO books (name,authors,edition,status,quantity,department) VALUES ('".$_POST["name"]."', '".$_POST["authors"]."', '".$_POST["edition"]."', '".$_POST["status"]."', '".$_POST["quantity"]."', '".$_POST["department"]."')";
	       if ($db->query($sql) === TRUE) {
       	   echo "insert Success";
       }
       else{
       	echo "Not Inserted";
       }

		header("location: books.php");
		exit;  

	} 


?>

 
</div>

<div>
  <span style="font-size:30px;cursor:pointer; color: black;" onclick="openNav()">&#9776; Insert Book</span>
  <div  style="text-align: center;">
  </div>

</div>

	</div>
	<div class="option col-md-9">
			<div class="" style="float: left;">
				<form method="post">

					<input type="text" name="search" placeholder="search books.." required="">
					<input type="submit" name="submit1">
			
				</form>
					<br>
					<form class="navbar-form" method="post">
						<input  type="text" name="bid" placeholder="Enter Book ID" required="">
						<button type="submit" name="submit2">Delete</button>
				</form>
			</div>

		<div style="float: right; margin-right:30px;">
		<nav class="nav-menu d-none d-lg-block" style="float: left">
		<ul>
			<li class="drop-down"><a class="btn btn-success" style="color: black;height: 50px;" href="#"><h3>Manage Book</h3></a> 
				<ul>
					<li><a  href="request.php">Book Request</a></li>
					<li><a  href="issue_information.php">Issue Information</a> </li>
				</ul>
			</li>
		</ul>
		</nav>
		</div>
	

<div style="padding-top: 120px;">
<h2>List Of Books</h2>
<?php

	if(isset($_POST['submit1']))
	{
		$q=mysqli_query($db,"SELECT * from books where name like '%$_POST[search]%' ");

		if(mysqli_num_rows($q)==0)
		{
			echo "Sorry! No book found. Try searching again.";
		}
		else
		{
	echo "<table class='table table-bordered table-hover tbl' >";
		echo "<tr style='background-color: #6db6b9e6;'>";
			//Table header
			echo "<th>"; echo "ID";	echo "</th>";
			echo "<th>"; echo "Book-Name";  echo "</th>";
			echo "<th>"; echo "Authors Name";  echo "</th>";
			echo "<th>"; echo "Edition";  echo "</th>";
			echo "<th>"; echo "Status";  echo "</th>";
			echo "<th>"; echo "Quantity";  echo "</th>";
			echo "<th>"; echo "Department";  echo "</th>";
		echo "</tr>";	

		while($row=mysqli_fetch_assoc($q))
		{
			echo "<tr>";
			echo "<td>"; echo $row['bid']; echo "</td>";
			echo "<td>"; echo $row['name']; echo "</td>";
			echo "<td>"; echo $row['authors']; echo "</td>";
			echo "<td>"; echo $row['edition']; echo "</td>";
			echo "<td>"; echo $row['status']; echo "</td>";
			echo "<td>"; echo $row['quantity']; echo "</td>";
			echo "<td>"; echo $row['department']; echo "</td>";

			echo "</tr>";
		}
	echo "</table>";
		}
	}

	//general 
	
	else
		{
	
		$res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");

		if(mysqli_num_rows($res)==0)
		{
			echo "Sorry! No book found. Try searching again.";
		} ?>
		

	<table class="table table-dark table-bordered">
	<?php	echo "<tr style='background-color: #6db6b9e6; color:white;'>";
			//Table header
			echo "<th>"; echo "ID";	echo "</th>";
			echo "<th>"; echo "Book-Name";  echo "</th>";
			echo "<th>"; echo "Authors Name";  echo "</th>";
			echo "<th>"; echo "Edition";  echo "</th>";
			echo "<th>"; echo "Status";  echo "</th>";
			echo "<th>"; echo "Quantity";  echo "</th>";
			echo "<th>"; echo "Department";  echo "</th>";
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
			echo "<td>"; echo $row['department']; echo "</td>";

			echo "</tr>";
		}
	echo "</table>";
	}
	if(isset($_POST['submit2']))
	{
		mysqli_query($db,"DELETE from books where bid = '$_POST[bid]'; ");
				
		
	}


?>

</div>
</div>	
</div>
</section>

	

</body>
</html>
<?php
include('../assets/layout/footer.php');
?>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

