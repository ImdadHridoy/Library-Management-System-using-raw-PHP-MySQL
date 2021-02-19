<?php
  
  include('../assets/layout/navbar.php');
  include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>

  <title>Student Login</title>

<style type="text/css">

.sec{
height: 650px; 
width: 100%;
background-color: mediumseagreen;
}
.banner{
position: absolute;
top: 100px;
left: 500px;
background-color: #1192b9;
height: 460px;
width: 500px;
text-align: center;
color: white;
padding-top: 30px;
opacity: 1
}
.img{
height: 650px; width: 100%;
}

</style>   
</head>
<body>


<section>
<div class="sec">
<div>
  <img class="img" src="../assets/img/admin.jpg">
</div>

<div class="banner card">

<form class="text-center p-5" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">

    <p style="color: blue;" class="h2 mb-4">Login As ADMIN</p>
    <input type="text" name="username" class="form-control mb-4" placeholder="User-NAme">
    <input type="password" name="password"  class="form-control mb-4" placeholder="Password">
    <input class="btn btn-info btn-block my-4 btn-danger" type="submit" name="submit">
    <div class="d-flex justify-content-around">
    <div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox">
            <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
        </div>
    </div>
        <div>
            <a href="">Forgot password?</a>
        </div>
    </div>

    <p>Not a member?
        <button><a style="color: blue;" href="registration.php">Register</a></button>
    </p>

</form>


</div>

<?php



if(isset($_POST['submit']))
  {
      
    $count=0;
    $res=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_POST[username]' && password='$_POST[password]';");
    $count=mysqli_num_rows($res);

    if($count==0)
    {
      ?>
        <div class="alert alert-danger" style="width: 600px; margin-left: 370px; background-color: #de1313; color: white">
          <strong>The username and password doesn't match</strong>
        </div>    
      <?php
    }
    else
    {
       $_SESSION['admin_login_user'] = $_POST['username'];
      ?>
       <script type="text/javascript">
          window.location="index.php";
        </script>
      <?php
    }
  }

?>
</div> 
</section>
</body>
</html>
<?php
include('../assets/layout/footer.php');
?>