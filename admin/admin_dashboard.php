<?php
require('functions.php');
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
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
                <li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>

            </ul>
        </div>
    </nav>
 
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: skyblue;">
    <div class="container-fluid">
        <ul class="nav navbar-nav navbar-center">
            <li class="nav-item">
                <a href="admin_dashboard.php" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item dropdown">
                <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Book</a>
                <div class="dropdown-menu">
                    <a href="add_book.php" class="dropdown-item">Add New Book</a>
                    <a href="manage_book.php" class="dropdown-item">Manage Books</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
                <div class="dropdown-menu">
                    <a href="add_cat.php" class="dropdown-item">Add New Category</a>
                    <a href="manage_cat.php" class="dropdown-item">Manage Category</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Author</a>
                <div class="dropdown-menu">
                    <a href="add_author.php" class="dropdown-item">Add New Author</a>
                    <a href="manage_author.php" class="dropdown-item">Manage Authors</a>
                </div>
            </li>
            <li class="nav-item">
                <a href="issue_book.php" class="nav-link">Issue Book</a>
            </li>


        </ul>
    </div>

</nav>
    <span><marquee behavior="" direction="">This is Library management System.Library opens at 8:00 AM and 
        close at 8:00 PM</marquee></span>
    
        <div class="row">
            <div class="col-md-3">
                <div class="card bg-light" style="width:300px;">
                <div class="card-header">
                    Registered Users:
                </div>
                <div class="card-body">
                    <p class="card-text">No of total Users:<?php echo get_user_count(); ?></p>
                    <a href="regusers.php" class="btn btn-danger" target="_blank">View Registered Users</a>
                </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-light" style="width:300px;">
                <div class="card-header">
                    Registered Books:
                </div>
                <div class="card-body">
                    <p class="card-text">No of available books:<?php echo get_book_count(); ?></p>
                    <a href="regbooks.php" class="btn btn-primary" target="_blank">View Registered Books</a>
                </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-light" style="width:300px;">
                <div class="card-header">
                    Registered Category:
                </div>
                <div class="card-body">
                    <p class="card-text">No of book's category:<?php echo get_category_count(); ?></p>
                    <a href="regcat.php" class="btn btn-info" target="_blank">View Category</a>
                </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-light" style="width:300px;">
                <div class="card-header">
                    Registered Authors:
                </div>
                <div class="card-body">
                    <p class="card-text">No of available authors:<?php echo get_author_count(); ?></p>
                    <a href="regauth.php" class="btn btn-primary" target="_blank">View authors</a>
                </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-light" style="width:300px;">
                <div class="card-header">
                    Issued Books:
                </div>
                <div class="card-body">
                    <p class="card-text">No of Issued Books:<?php echo get_issued_book_count(); ?></p>
                    <a href="view_issued_book.php" class="btn btn-success" target="_blank">View Issued Books</a>
                </div>
                </div>
            </div>
        </div>
    
</body>
</html>