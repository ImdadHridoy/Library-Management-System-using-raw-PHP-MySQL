<?php
  include "connection.php";
  include('../assets/layout/navbar.php');
?>
<style type="text/css">
  .sec{
  height: 700px;
  width: 100%;
  background-color: #1bd6bc;
}
</style>

<section>
  <div class="sec">
  <div  style="padding-top:200px;padding-left: 50px;">
    <a href="books.php" class="btn btn-primary">Books All Books</a>
  </div>
<?php
	if(isset($_SESSION['login_user']))
		{
      $std_name = $_SESSION['login_user'];

		// $sql= "SELECT student.username,student.id as std_id,books.bid,books.authors,books.edition,books.status,books.name as bname,issue_book.* FROM student inner join issue_book ON student.username=issue_book.user_name inner join books ON issue_book.bid=books.bid";

      $sql= "SELECT student.username,student.id as std_id,books.bid,books.authors,books.edition,books.status,books.name as bname,issue_book.* FROM student inner join issue_book ON student.username=issue_book.user_name inner join books ON issue_book.bid=books.bid WHERE issue_book.user_name= '$std_name' ORDER BY issue_book.id DESC ";
		$res= mysqli_query($db,$sql);
		if(mysqli_num_rows($res)==0)
			{
				echo "<h2><b>";
				echo "There's no pending request.";
				echo "</h2></b>";
			}
		else { ?>
      <div style="padding: 40px;">
 		<table class="table table-striped table-dark">
  		<thead style="background-color: #6db6b9e6;">
  		<th>BookID</th>
  		<th>Student Name</th>
  		<th>Student Roll</th>
  		<th>Book Name</th>
  		<th>Authors</th>
  		<th>Edition</th>
  		<th>Issue_date</th>
  		<th>Return_date</th>
  		<th>Aprove</th>
  		</thead>
  		<?php
  		while($row=mysqli_fetch_assoc($res)) {
  			
  			?>
 
  		<tbody>
  		<tr>
  			<td><?php echo $row['bid'] ?></td>
  			<td><?php echo $row['username'] ?></td>
  			<td><?php echo $row['std_id'] ?></td>
  			<td><?php echo $row['bname'] ?></td>
  			<td><?php echo $row['authors'] ?></td>
  			<td><?php echo $row['edition'] ?></td>
  			<td><?php echo $row['issue_date'] ?></td> 
  			<td><?php echo $row['return_date'] ?></td> 
  			<td>
  			<?php
  			if($row['apv_id'] == 1){
  				echo "Approved(+)";
	  		}
	  		else{
	  		echo "Not Approved(-)";
	  		}
  			?>
			<?php } ?>
		</td>
  		</tbody>
  	</table>

  </div>
   		
<?php
}

}

?>
</div>
</section>

<?php
include('../assets/layout/footer.php');
?>