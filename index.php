<?php
session_start();
  
if(isset($_POST['login'])){
    // $email=$_POST['email'];
    $connection=mysqli_connect("localhost","root","");
   $db=mysqli_select_db($connection,"lms");
   $query="select * from users where email='$_POST[email]'";
   $query_run=mysqli_query($connection,$query);

   while($row=mysqli_fetch_assoc($query_run)){
    if($row['email']==$_POST['email']){
        if($row['password']==$_POST['password']){
            $_SESSION['name']=$row['name'];
            $_SESSION['email']=$row['email'];
            $_SESSION['id']=$row['id'];
            header("Location:user_dashboard.php");
          
        }
        else{
            ?>
            <br><br><center><span class="alert-danger">Wrong Password</span></center>
            <?php
            // echo "Incorrect Password";
            
        }
    }
    // else{
    //     echo "Incorrect Email ID";
    // }
   }
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" 
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" 
    integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <style type="text/css">
        #side_bar{
            background-color: whitesmoke;
            padding: 50px;
            width: 300px;
            height: 450px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Library Management System(LMS)</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="admin/index.php">Admin Login</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="index.php">User Login</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="signup.php">Register</a>
                </li>

            </ul>

        </div>
    </nav>
    <br>
    <span><marquee behavior="" direction="">This is Library management System.Library opens at 8:00 AM and 
        close at 8:00 PM</marquee></span>
    <br><br>
    <div class="row">
        <div class="col-md-4" id="side_bar">
            <h5>Library Timing</h5>
            <ul>
                <li>Opening Timing: 8:00 AM</li>
                <li>Closing Timing: 8:00 PM</li>
                <li>Sunday OFF</li>
            </ul>

            <h5>What We provide??</h5>
            <ul>
                <li>Free Wi-fi</li>
                <li>News-Papers</li>
                <li>Discussion Room</li>
                <li>RO Water</li>
                <li>PeaceFull Environment</li>
            </ul>
        </div>
         <div class="col-md-8" id="main_content">
        <center><h3>User Login Form</h3></center>
        <form action="" method="post">
            <!-- <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" name="name" class="form-control" required >
            </div> -->
             <div class="form-group">
                <label for="name">Email ID:</label>
                <input type="text" name="email" class="form-control" required >
            </div>
             <div class="form-group">
                <label for="name">Password:</label>
                <input type="password" name="password" class="form-control" required >
            </div>
             <!-- <div class="form-group">
                <label for="name">Mobile Number:</label>
                <input type="text" name="mobile" class="form-control" required >
            </div>
             <div class="form-group">
                <label for="name">Address:</label>
                <textarea name="address" id="" cols="40" rows="3" class="form-control" required></textarea>
            </div> -->
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>

        <?php
            //  session_start();
           
        ?>

    </div>
    </div>

   
    
</body>
</html>