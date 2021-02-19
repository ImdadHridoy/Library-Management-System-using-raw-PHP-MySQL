<?php
session_start();
 ?>

<!DOCTYPE html>

<head>

<title>Online Library</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- Template Main CSS File -->
<?php
  if($_SERVER['PHP_SELF'] == '/library/index.php'){?>

<link  rel="stylesheet" href="assets/css/style.css">
<?php
}
?>


<link  rel="stylesheet" href="../assets/layout/style.css">

</head>


<body>
<header id="header" class="fixed-top">
  <div class="container d-flex">
    <div class="logo mr-auto">
      <?php if($_SERVER['PHP_SELF'] != '/library/index.php'){  ?>
         <h1 class="text-light"><a href="../index.php">Online Library</a></h1>
      <?php }
      else{ ?>
        <h1 class="text-light"><a href="index.php">Online Library</a></h1>
    </div>
        <nav class="nav-menu d-none d-lg-block">
            <ul>
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="student/student_login.php">StudentLogin</a></li>
              <li><a href="admin/admin_login.php">Admin Login</a></li>
            </ul>
        </nav>
     <?php  } ?> 
    


<?php

$url = $_SERVER['PHP_SELF'];
$urlParts = explode("/", $url);
$dir = $urlParts[2];
if ($dir == "student") {

if (isset($_SESSION['login_user'])) 
{ ?> 
  
  <div style="position: absolute;left: 500px; text-decoration: none;bottom: 20px;">
    <nav class="nav-menu d-none d-lg-block" style="float: left">
      <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="books.php">Books</a></li>
          <li><a href="feedback.php">Feedback</a></li>
          <li style="padding-top: 7px;color: green">User:</li> 
          <li class="drop-down"><a href=""><?php echo $_SESSION['login_user']; ?></a>
          <ul>
          <li><a style="width: 100px;text-align: center;" type="button" href="logout.php">LOG-OUT</a></li>
          </ul>
        </li>
    </ul>
    </nav>
<?php 
  } 


 
else { ?>
    <nav class="nav-menu d-none d-lg-block" style="float: left;position: absolute;left:700px;bottom: 20px;">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="student_login.php">StudentLogin</a></li>
          <li><a href="../admin/admin_login.php">Admin Login</a></li>
        </ul>
      </nav>
<?php }
}
 ?>
</div>

<?php
 if ($dir == "admin") { 
   if (isset($_SESSION['admin_login_user'])) { ?>
  <div class="admin-nav">
    <nav class="nav-menu d-none d-lg-block" style="">
        <ul>
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="books.php">Books</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="student.php">Students</a></li>
            <li style="color: green;padding:8px;">Admin:</li> 
               <li class="drop-down"><a href=""><?php echo $_SESSION['admin_login_user']; ?></a>
                  <ul>
                    <li><a style="width: 100px;text-align: center;" type="button" href="logout.php">LOG-OUT</a>
                    </li>
                  </ul>
               </li>
          </ul>
      </nav>
   </div>
<?php 
 }
   else { ?>
      <div style="position: absolute;bottom: 10px;left: 1000px;">
      <nav class="nav-menu d-none d-lg-block">
        <ul>
            <li class="drop-down"><a style="" href="#">SignIn or SignUp </a>  
              <ul>
                <li><a href="admin_login.php">Login</a></li>
                <li><a href="registration.php">Register</a></li>
              </ul>
            </li>
        </ul>
     
      </nav>
    </div>
     
     <!--    <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="../admin/admin_login.php">Admin Login</a></li>
          <li><a href="feedback.php">Feedback</a></li>
        </ul>
      </nav> -->
  
    
<?php
  }   
} 

?>

</div>
</header>

  
</body>
</html>

