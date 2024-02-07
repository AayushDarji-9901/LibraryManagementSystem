<?php
 session_start();
 $connection=mysqli_connect("localhost","root","");
 $db=mysqli_select_db($connection,"lms");
 $name="";
 $email="";
 $mobile="";
 

 $query="select * from admins where email='$_SESSION[email]'";
 $query_run=mysqli_query($connection,$query);
 
 while($row=mysqli_fetch_assoc($query_run)){
    $name=$row['name'];
    $email=$row['email'];
    $mobile=$row['mobile'];
    
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
                <a class="navbar-brand" href="admin_dashboard.php">Library Management System(LMS)</a>
            </div>
           <font style="color: white;"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font> 
           <font style="color: white;"><span><strong>Email:   <?php echo $_SESSION['email'];?></strong></span></font> 
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">My Profile</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="view_profile.php">View Profile</a>
                        <a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
                        <a class="dropdown-item" href="change_password.php">Change Password</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>

            </ul>

        </div>
    </nav>
    <br>
    <span><marquee behavior="" direction="">This is Library management System.Library opens at 8:00 AM and 
        close at 8:00 PM</marquee></span>
    
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="">
                    <div class="form-group">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" value="<?php echo $name; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Email:</label>
                        <input type="text" class="form-control" value="<?php echo $email; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Mobile:</label>
                        <input type="text" class="form-control" value="<?php echo $mobile; ?>" disabled>
                    </div>
                    
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    
</body>
</html>