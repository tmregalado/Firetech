<?php
session_start();
include('includes/config.php');

if(isset($_POST['login-submit']))
  {
    $email = $_POST['logemail'];
    $password = $_POST['logpassword'];

    $query=mysqli_query($con,"select ID,firstName, lastName, isActive from tbladmin where  Email='$email' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    $uip = $_SERVER ['REMOTE_ADDR'];
    $link= $_SERVER['REQUEST_URI'];
    $action='login-submit';

    if($ret>0){
    $isactive=$ret['isActive'];
    if($isactive==1){
      $_SESSION['uname']=$_POST['firstName'];
      $_SESSION['aid']=$ret['ID'];
      $_SESSION['adminname']=$ret['lastName'];
      $pos = $row['userRole']; 
      $status=1;
      mysqli_query($con,"insert into  tbllogs(userName,userIp,userAction,actionUrl,actionStatus) values('$uname','$uip','$action','$link','$status')");

      if($pos == "admin"){
            header('location:admin/dashboard.php');
         }
        else{ header("Location:main.php");}
    } else { 
   $status=0;
      mysqli_query($con,"insert into  tbllogs(userName,userIp,userAction,actionUrl,actionStatus) values('$uname','$uip','$action','$link','$status')") ; 
    echo "<script>alert('Account is blocked. Contact adminstrator.');</script>"; 
    }}
    else{
       $status=0;
      mysqli_query($con,"insert into  tbllogs(userName,userIp,userAction,actionUrl,actionStatus) values('$uname','$uip','$action','$link','$status')") ; 
    echo "<script>alert('Invalid Details.');</script>";          
    }
  }
  ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-secondary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="includes/login.inc.php" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                name="logemail"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="logpassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" name="login-submit" class="btn btn-primary btn-user btn-block">Log In</button>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
</html>