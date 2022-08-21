<?php include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <!--Font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin Registration</title>
    <style>
        body{
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
      <h2 class="text-center mb-5">Admin Registration</h2> 
      <div class="row f-flex judtify-content-center">
        <div class="col-lg-6 col-xl-5">
            <img src="../uploads/adminpage.jpg" alt="Admin Registration" class="fluid">
        </div>
        <div class="col-lg-6 col-xl-4">
            <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter Name" required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter Email" required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter Password" required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required="required" class="form-control">
                </div>
                <div>
                    <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_register" value="Register">
                    <p class="small fw-bold mt-2 pt-1">Already have an account? <a href="admin_login.php" class="link-danger">Login</a></p>
                </div>

            </form>
        </div>
      </div> 
    </div>
</body>
</html>

<!-- php code -->
<?php
if(isset($_POST['admin_register'])){
   $admin_name=$_POST['admin_name']; 
   $admin_email=$_POST['admin_email']; 
   $admin_password=$_POST['admin_password']; 
   $hash_password=password_hash($admin_password,PASSWORD_DEFAULT); 
   $conf_admin_password=$_POST['conf_admin_password'];
   
    // select query
    $select_query="Select * from `admin_table` where admin_name='$admin_name' or admin_email='$admin_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username and email already exist')</script>";
    }else if ($user_password != $conf_user_password){
        echo "<script>alert('Password do not match')</script>";
    }
    else{
    //Insert Query
   $insert_query="insert into `admin_table`(admin_name, admin_email, admin_password) values
     ('$admin_name', '$admin_email', '$hash_password' ";
     $sql_execute=mysqli_query($con,$insert_query);
    }
}