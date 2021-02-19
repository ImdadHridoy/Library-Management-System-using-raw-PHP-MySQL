
<?php
  include('../assets/layout/navbar.php');
  
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
.image{
height: 650px; width: 100%;
}
.books{
position: absolute;
top: 5px;
}
.banner{
position: absolute;
top: 200px;
left: 400px;
background-color: dodgerblue;
height: 250px;
width: 500px;
text-align: center;
color: white;
padding-top:30px;
opacity: .9
}

  
</style>
<body>
<section>
<div class="sec">
<div>
  <img class="image" src="../assets/img/color2.jpg">
</div>



<div class="banner">
  <h1>Welcome To library</h1>
  <?php if (isset($_SESSION['admin_login_user'])) {  ?>
  <h2> <?php echo $_SESSION['admin_login_user']; ?></h2>
<?php } else{?>
	 <h1>Login As admin</h1>
<?php } ?>
</div>
</div>
</section>

<footer>
  <?php  include('../assets/layout/footer.php'); ?>
</footer>

</body>
</html>