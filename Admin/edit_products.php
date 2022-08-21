<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_data="Select * from `products` where product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_name'];
    // echo $product_title;
    $product_description=$row['product_description'];
    $product_title=$row['product_name'];
    $category_id=$row['category_id'];
    $product_image=$row['product_image'];
    $product_price=$row['product_price'];

    //fetching category name
    $select_category="Select * from `categories` where category_id=$category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_name'];
    // echo $category_title;

}
?>

<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" value="<?php echo $product_title?>" name="product_title" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" id="product_desc" value="<?php echo $product_description?>" name="product_desc" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_category" class="form-label">Product Categories</label>
         <select name="product_category" class="form-select">
             <option value="<?php echo $category_title?>"><?php echo $category_title?></option>
             <?php
             $select_category_all="Select * from `categories`";
             $result_category_all=mysqli_query($con,$select_category_all);
             while($row_category_all=mysqli_fetch_assoc($result_category_all)){
             $category_title=$row_category_all['category_name'];
             $category_id=$row_category_all['category_id'];
             echo "<option value='$category_id'>$category_title</option>";
             };

             ?>
             
         </select>  
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image" class="form-label">Product Image</label>
            <div class="d-flex">
            <input type="file" id="product_image" name="product_image" class="form-control w-90 m-auto" required="required">
            <img src="./puploads/<?php echo $product_image?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" value="<?php echo $product_price?>" name="product_price" class="form-control" required="required">
        </div>
        <div class="w-50 m-auto">
            <input type="submit" name="edit_product" name="edit_product" value="Update Product" class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>

<!-- Editing Products -->
<?php
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_desc=$_POST['product_desc'];
    $product_category=$_POST['product_category'];
    $product_price=$_POST['product_price'];

    $product_image=$_FILES['product_image']['name'];

    $temp_image=$_FILES['product_image']['tmp_name'];

    // checking for field is empty on not
    if($product_title=='' or $product_desc=='' or $product_category=='' or $product_image=='' or $product_price==''){
        echo "<script>alert('Please fill all the field to continue')</script>";
    }else{
        move_uploaded_file($temp_image,"./puploads/$product_image");

        // Query to update products
        $update_product="update `products` set product_name='$product_title', product_description='$product_desc',
        category_id='$product_category', product_image='$product_image', 
        product_price='$product_price', date=NOW() where product_id=$edit_id";
        $result_update=mysqli_query($con,$update_product);
        if($result_update){
            echo "<script>alert('Product Update Successfully')</script>";
            echo "<script>window.open('./adminindex.php?view_products', '_self')</script>";
        }
    }

}
?>