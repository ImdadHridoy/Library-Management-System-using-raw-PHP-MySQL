
<?php
  include "connection.php";
  include('../assets/layout/navbar.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

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
	
<div style="padding:100px;">
 
  <div> <a class="btn btn-primary" href="books.php">Books</a> &nbsp
 <a class="btn btn-primary" href="request.php">Book Request</a> &nbsp
 <a class="btn btn-primary" href="issue_information.php">Issue Information</a> 
 <br> <br> <br><br>
</div>
<?php
if (isset($_GET["apv"])) {
$id = htmlspecialchars($_GET["apv"]);
$Parts = explode("/", $id);
$arr = $Parts;

if($arr[0] == 1) {
	$sql = "UPDATE issue_book SET apv_id = 2,approve='not aproved',issue_date='book not approved by admin',return_date='book not approved by admin' where bid=$arr[1]";

		if ($db->query($sql) === TRUE) {
			echo "Record updated successfully";
		} 
		
	}
  
  else if($arr[0]  == 2){
  		$date = date('Y-m-d H:i:s');
		$ret_date=date_create(".$date.");
		date_add($ret_date,date_interval_create_from_date_string("20 days"));
		$return_date = date_format($ret_date,"Y-m-d H:i:s");
  		

   		$sql = "UPDATE issue_book SET apv_id = 1, approve='approved',issue_date= '".$date."',return_date = '".$return_date."'   where bid=$arr[1]";

		if ($db->query($sql) === TRUE) {
			echo "Record updated successfully";
		} 
   }
   else{
   		echo "record not updated";
   }

}
?>
 
 
<?php
	if(isset($_SESSION['admin_login_user']))
		{

		$sql= "SELECT student.username,student.id as std_id,books.bid,books.authors,books.edition,books.status,books.name as bname,issue_book.* FROM student inner join issue_book ON student.username=issue_book.user_name inner join books ON issue_book.bid=books.bid";

		$res= mysqli_query($db,$sql);
		if(mysqli_num_rows($res)==0)
			{
				echo "<h2><b>";
				echo "There's no pending request.";
				echo "</h2></b>";
			}
		else { ?>

 		<table class="table table-striped table-dark">
  		<thead class="thead-dark">
  		<th>BookID</th>
  		<th>Student Name</th>
  		<th>Student Roll</th>
  		<th>Book Name</th>
  		<th>Authors</th>
  		<th>Edition</th>
  		<th>Status</th>
  		<th>Aprove</th>
  		</thead>
  		<?php
  		while($row=mysqli_fetch_assoc($res)) { ?>

 
  		<tbody>
  		<tr>
  			<td><?php echo $row['bid'] ?></td>
  			<td><?php echo $row['username'] ?></td>
  			<td><?php echo $row['std_id'] ?></td>
  			<td><?php echo $row['bname'] ?></td>
  			<td><?php echo $row['authors'] ?></td>
  			<td><?php echo $row['edition'] ?></td>
  			<td><?php echo $row['status'] ?></td>
  			
			<td><a class="btn btn-primary" href="<?php echo $_SERVER['PHP_SELF'].'?apv='.$row['apv_id'].'/'.$row['bid']; ?>"><?php echo $row['approve']; ?></a></td>
			</tr>

			<?php } ?>
  		</tbody>
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