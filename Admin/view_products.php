
<h1 class="text-success text-center">Product List</h1>

<table class="table table-bordered mt-5">
<thead class="bg-info">
<tr>

<th>Product Id</th>
<th>Product Name</th>
<!-- <th>Product Description</th> -->
<!-- <th>Category Id</th> -->
<!-- <th>Added At</th> -->
<th>Photo</th>
<th>Product Price</th>
<th>Total Sold</th>
<th>Status</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>
<tbody class="bg-secondary text-light">
    <?php
    $get_products="Select * from `products`";
    $result=mysqli_query($con,$get_products);
    $number=0;
    while($row=mysqli_fetch_assoc($result)){
        $product_id=$row['product_id'];
        $product_name=$row['product_name'];
        $product_image=$row['product_image'];
        $product_price=$row['product_price'];
        $status=$row['status'];
        $number++;
        ?>
        <tr class='text-center'>
        <td><?php echo $number?></td>
        <td><?php echo $product_name?></td>
        <td><img src='./puploads/<?php echo $product_image?>' class='product_img'/></td>
        <td><?php echo $product_price?></td>
        <td><?php
        $get_count="Select * from `orders_panding` where product_id=$product_id";
        $result_count=mysqli_query($con,$get_count);
        $rows_count=mysqli_num_rows($result_count);
        echo $rows_count;

       ?></td>
        <td><?php echo $status?></td>
        <td><a href='adminindex.php?edit_products=<?php echo $product_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='adminindex.php?delete_product=<?php echo $product_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
    </tr>
    <?php
    }
    ?>
    </tbody>
</table>