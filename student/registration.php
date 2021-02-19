<?php
include("connection.php");
include('../assets/layout/navbar.php')

?>\
<style type="text/css">
.sec{
height: 650px; 
width: 100%;
}
.img{
height: 650px; width: 100%;
}
  
.banner{
position: absolute;
top: 100px;
left: 500px;
background-color: dodgerblue;
height: 460px;
width: 500px;
text-align: center;
color: white;
padding-top: 30px;
opacity: 1
}

</style>
</body>
<section>
  <div>
  <img class="img" src="../assets/img/bookss.jpg">
</div>
<div class="card card-body bg-light" style="position:absolute;top:100px;left:500px;text-align: center">
    <h4 class="card-title">Register As Student</h4>
  <article class="card-body mx-auto" style="max-width: 400px;">
     <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
              </div>
              <input class="form-control" type="text" name="first" placeholder="First Name" required=""> 
          </div> <!-- form-group// -->

          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
              </div>
              <input class="form-control" type="text" name="last" placeholder="Last Name" required=""> 
          </div> <!-- form-group// -->

          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
            </div>
           <input class="form-control" type="text" name="username" placeholder="Username" required=""> 
          </div> 

          <div class="form-group input-group">
            <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input class="form-control" type="password" name="password" placeholder="Password" required=""> 
          </div> 
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
          </div> 

          <div class="form-group">
            <input class="form-control  btn btn-primary" type="submit" name="submit">
          </div> <!-- form-group// -->      
          <p class="text-center">Have an account? <a href="admin_login.php">Log In</a> </p>                                                                 
    </form>
  </article>
</div> 
</section>




<?php
include('../assets/layout/footer.php');
?>

  <?php
if (isset($_POST['submit'])) {

$sql = "INSERT INTO student (first,last,username,password, email,contact)
VALUES('".$_POST['first']."','".$_POST['last']."', '".$_POST['username']."', '".$_POST['password']."','".$_POST['email']."','".$_POST['contact']."')";

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
       