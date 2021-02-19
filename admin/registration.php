<?php
include("connection.php");
include('../assets/layout/navbar.php')

?>




<?php
if (isset($_POST['submit'])) {

$sql = "INSERT INTO admin (name, username,password, email,contact)
VALUES('".$_POST['name']."', '".$_POST['username']."', '".$_POST['password']."','".$_POST['email']."','".$_POST['contact']."')";

if ($db->query($sql) === TRUE) { ?>

  <script type="text/javascript">
    alert('Insert Succes');
  </script>
<?php
} 
else {
  echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();

}
?>
       
   
   

</body>
</html>

<div class="cont">
<br>  <p class="text-center">More bootstrap 4 components on <a href="http://bootstrap-ecommerce.com/"> Bootstrap-ecommerce.com</a></p>
<hr>
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
  
  <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
  
    <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
     </div>
        <input class="form-control" type="text" name="name" placeholder="Name" required=""> 
    </div> <!-- form-group// -->
    <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
    </div>
          <input class="form-control" type="text" name="username" placeholder="Username" required=""> 
    
    </div> <!-- form-group// -->
   
    <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
    </div>
          <input class="form-control" type="password" name="password" placeholder="Password" required=""> 

    </div> <!-- form-group// -->
    <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
    </div>
          <input class="form-control" type="text" name="email" placeholder="Email" required="">
    </div>  
    
    <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
    </div>
          <input class="form-control" type="text" name="contact" placeholder="Phone No">
        
    </div> <!-- form-group// -->                                      
    <div class="form-group">
       <input class="form-control  btn btn-primary" type="submit" name="submit">
    </div> <!-- form-group// -->      
    <p class="text-center">Have an account? <a href="admin_login.php">Log In</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->

<br><br>
<?php
include('../assets/layout/footer.php');
?>

