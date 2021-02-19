
<?php
include("../assets/layout/navbar.php");
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
.sec{
height: 650px; 
width: 100%;
background-color: dodgerblue;
}
.c{
color: white;
}

.books{
position: absolute;
top: 5px;
}
.banner{
position: absolute;
top: 200px;
left: 500px;
background-color: dodgerblue;
height: 250px;
width: 500px;
text-align: center;
color: white;
padding-top: 30px;
opacity: .5
}

	
</style>
<body>
<section>
<div class="sec">

<div class="books col-md-3">	
	<div style=" height: 350px;">
		<div class=" c card" style="width: 5rem;height: 3rem; top: 10rem;left: 3rem">
			<img class="card-img-top" src="../assets/img/php.jpg" alt="Card image cap">
			<div class="">
			<p class="">The Complete Reference PHP</p>
			</div>
		</div>

		<div class=" c card" style="width: 5rem;height: 3rem;top: 7rem;left: 9rem">
			<img class="card-img-top" src="../assets/img/php and mysql.jpg" alt="Card image cap">
			<div>
			<p>PHP and mysql web Devolopment</p>
		</div>
		</div>

		<div class=" c card" style="width: 5rem;height: 3rem;top:4rem;left: 15rem">
			<img class="card-img-top" src="../assets/img/harrypotter.jpg" alt="Card image cap">
			<div>
			<p >Harry potter</p>
			</div>
		</div>

	</div>

	<div style="">
		<div class=" c card" style="width: 5rem;height:3rem;top: 3rem;left: 3rem">
			<img class="card-img-top" src="../assets/img/51cjmg2TGDL.jpg" alt="Card image cap">
			<div>
			<p >Learn PHP programming</p>
			</div>
			</div>

		<div class=" c card" style="width: 5rem;height:5rem;left: 9rem">
			<img class="card-img-top" src="../assets/img/new.png" alt="Card image cap">
			<div>
			<p >Books</p>
			</div>
		</div>
		<div class=" c card" style="width:5rem;height:3rem; bottom:5rem;left: 15rem">
			<img class="card-img-top" src="../assets/img/cprogram.jpg" alt="Card image cap">
			<div>
			<p >Programming C</p>
			</div>
		</div>
	</div>
</div>

<div class="banner">
	<?php if(isset($_SESSION['login_user'])){ ?>

		<h1> Welcome <?php echo $_SESSION['login_user']; ?> </h1>
		<h3>Select books for borrow</h3>
		<h5><a href="books.php"><button style="background: yellow;" >See All boooks</button></a></h5>
	<?php

	} ?> 

</div>
</div>
</section>

<footer>
	<?php  include('../assets/layout/footer.php'); ?>
</footer>

</body>
</html>