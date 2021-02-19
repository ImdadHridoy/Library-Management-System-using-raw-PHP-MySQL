<?php
include('connection.php');
include('../assets/layout/navbar.php');
?>
<section>
<?php
if (isset($_SESSION['admin_login_user'])) {
	$sql = "select student.username,student.email,student.id,books.name as bname,books.edition,issue_book.* from student inner join issue_book ON student.id=issue_book.student_id inner join books ON issue_book.bid=books.bid where issue_book.apv_id = 1";

	$res= mysqli_query($db,$sql);
	if(mysqli_num_rows($res)==0)
			{
				echo "Sorry! No student found with that username. Try searching again.";
			}
			else
			{ ?>
				<table class="table table-bordered table-hover" style="margin-top: 200px;">
				<thead style='background-color: #6db6b9e6'>
					<th>Student Id</th>
					<th>Username</th>
					<th>Email</th>
					<th>Book Name</th>
					<th>Edition</th>
					<th>Approve</th>
					<th>Issue Date</th>
					<th>Return Date</th>
				</thead>


			<?php
			while($row=mysqli_fetch_assoc($res)){ ?>
				<tr>
					<td><?php echo $row['student_id']; ?></td>
					<td><?php echo $row['username']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['bname']; ?></td>
					<td><?php echo $row['edition']; ?></td>
					<td><?php echo $row['approve']; ?></td>
					<td><?php echo $row['issue_date']; ?></td>
					<td><?php echo $row['return_date']; ?></td>
				
				</tr>


		<?php	} ?>

		</table>
<?php }

}
?>
</section>