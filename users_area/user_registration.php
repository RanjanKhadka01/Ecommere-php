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
    <title>User Registartion</title>
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New Registration</h2>
        <div class="row f-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <!-- Username Field -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter Username" autocomplete="off" required="required" name="user_username"/>
                    </div>
                    <!-- Email Field -->
                    <div class="form-outline mb-4">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" id="user_email" class="form-control" placeholder="Enter Email" autocomplete="off" required="required" name="user_email"/>
                    </div>
                     <!-- Image Field -->
                     <div class="form-outline mb-4">
                    <label for="user_image" class="form-label">User Image</label>
                    <input type="file" id="user_image" class="form-control" required="required" name="user_image"/>
                    </div>
                     <!-- Password Field -->
                     <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter Password" autocomplete="off" required="required" name="user_password"/>
                    </div>
                    <!--Conform Password Field -->
                    <div class="form-outline mb-4">
                    <label for="conf_user_password" class="form-label">Confirm Password</label>
                    <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm Password" autocomplete="off" required="required" name="conf_user_password"/>
                    </div>
                    <!--Address Field-->
                    <div class="form-outline mb-4">
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" id="user_address" class="form-control" placeholder="Enter Address" autocomplete="off" required="required" name="user_address"/>
                    </div>
                    <!--Contact Field -->
                    <div class="form-outline mb-4">
                    <label for="user_contact" class="form-label">Contact</label>
                    <input type="text" id="user_contact" class="form-control" placeholder="Enter Contact" autocomplete="off" required="required" name="user_contact"/>
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an Account ? <a href="user_login.php" class="text-danger"> Login</a></p>
                    </div>

                    <form >

                    </form>
                </form>
            </div>
        </div>
    </div>
    

 <!-- Option 2: Separate Popper and Bootstrap JS -->
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>

<!-- php code -->
<?php
if(isset($_POST['user_register'])){
   $user_username=$_POST['user_username']; 
   $user_email=$_POST['user_email']; 
   $user_password=$_POST['user_password']; 
   $hash_password=password_hash($user_password,PASSWORD_DEFAULT); 
   $conf_user_password=$_POST['conf_user_password'];
   
   $user_address=$_POST['user_address']; 
   $user_contact=$_POST['user_mobile']; 
   $user_image=$_FILES['user_image']['name']; 
   $user_image_temp=$_FILES['user_image']['tmp_name']; 
    $user_ip=getIPAddress();

    // select query
    $select_query="Select * from `user_table` where user_username='$user_name' or user_email='$user_email' or user_mobile='$user_contact'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username and email already exist')</script>";
    }else if ($user_password != $conf_user_password){
        echo "<script>alert('Password do not match')</script>";
    }
    else{
    //Insert Query
    move_uploaded_file($user_image_temp, "./user_images/$user_image");
    $insert_query="insert into `user_table`(username, user_email, user_password, user_image, user_ip, user_address, user_mobile) values
     ('$user_username', '$user_email', '$hash_password', '$user_image',  '$user_ip', '$user_address', '$user_contact')";
     $sql_execute=mysqli_query($con,$insert_query);

}
// selecting cart items
$select_cart_items="Select * from `cart_details` where ip_address=$user_ip";
$result_cart=mysqli_query($con,$select_cart_items);
$rows_count=($result_cart);
if($rows_count>0){
    $_SESSION['username']=$user_username;
    echo "<script>alert('You have items in cart')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
}else{
    echo "<script>window.open('../index.php','_self')</script>";
}
}
?>