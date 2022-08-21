
<div class="container">
<div class="col-lg-12">

<h1 class="text-warning text-center">Users List</h1>

<table class="table table-striped table-hover table-boardered">

<tr>

<td>User Id</td>
<td>User Name</td>
<td>User Email</td>
<td>User Password</td>
<td>User IP</td>
<td>User Address</td>
<td>User Mobile</td>
<td>User Photos</td>
<!-- <td>Action</td> -->

</tr>

        <?php
                 $conn = new mysqli('localhost','root','','ecommerce');
                 if($conn->connect_errno!=0){
                     die("connection failed");
                 }
             $sql = "SELECT * FROM user_table";
             $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                    $user_id=$row['user_id'];
                    $username=$row['username'];
                    $user_email=$row['user_email'];
                    $user_password=$row['user_password'];
                    $user_ip=$row['user_ip'];
                    $user_address=$row['user_address'];
                    $user_mobile=$row['user_mobile'];
                    $user_image=$row['user_image'];

                    echo '<tr>
                    <th scope="row">'.$user_id.'</th>
                    <td>'.$username.'</td>
                    <th scope="row">'.$user_email.'</th>
                    <td>'.$user_password.'</td>
                    <th scope="row">'.$user_ip.'</th>
                    <td>'.$user_address.'</td>
                    <th scope="row">'.$user_mobile.'</th>
                    <td>'.$user_image.'</td>

                    </tr>';
                }     
        ?>

</table>
</div>
</div>

 <!-- <td>
 <button class=" btn btn-primary"><a href="update.php?updateid='.$id.'" class="text-light">Update</a></button>
 <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
 </td> -->