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
                    <a href="" class="dropdown-item">Add New Category</a>
                    <a href="" class="dropdown-item">Manage Category</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Author</a>
                <div class="dropdown-menu">
                    <a href="" class="dropdown-item">Add New Author</a>
                    <a href="" class="dropdown-item">Manage Authors</a>
                </div>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Issue Book</a>
            </li>


        </ul>
    </div>

</nav>
    <span><marquee behavior="" direction="">This is Library management System.Library opens at 8:00 AM and 
        close at 8:00 PM</marquee></span>
    
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="" method="post">
                <div class="form-group">
                   <label for="">Book Name:</label>
                   <input type="text" name="book_name" class="form-control" required>
                </div>
                <div class="form-group">
                   <label for="">Book Author:</label>
                   <select  class="form-control" name="book_author">
                    <option>-Select author-</option>
                    <?php
                     $connection=mysqli_connect("localhost","root","");
                     $db=mysqli_select_db($connection,"lms");
                     $query="select author_name from authors";
                     $query_run=mysqli_query($connection,$query);
                  
                     while($row=mysqli_fetch_assoc($query_run)){
                                ?>
                            <option><?php echo $row['author_name']; ?></option>
                            <?php
                    }
                   
                    ?>
                   </select>

                   <div class="form-group">
                   <label for="">Book Number:</label>
                   <input type="text" name="book_no" class="form-control" required>
                   </div>

                   <div class="form-group">
                   <label for="">Student ID:</label>
                   <input type="text" name="student_id" class="form-control" required>
                   </div>

                   <div class="form-group">
                   <label for="">Issue Date:</label>
                   <input type="text" name="issue_date" class="form-control" value="<?php echo date("d-m-y"); ?>" required>
                   </div>

                </div>
                
                <button class="btn btn-primary" name="issue_book">Issue Book</button>
            </form>
        </div>
        <div class="col-md-4"></div>
      </div>
    
</body>
</html>

<?php
if(isset($_POST['issue_book']))
{
    $connection=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($connection,"lms");
    $query="insert into issued_books values (null,$_POST[book_no],'$_POST[book_name]','$_POST[book_author]',
    $_POST[student_id],1,'$_POST[issue_date]')";
    $query_run=mysqli_query($connection,$query);
}
?>