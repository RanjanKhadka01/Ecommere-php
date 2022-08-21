<?php
include('../includes/connect.php');
if (isset($_POST['insert_product'])) {

    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    $product_image = $_FILES['product_image']['name'];
    $temp_image = $_FILES['product_image']['tmp_name'];

    // checking empty condition
    // if($product_title=='' or $description=='' or $product_category=='' or $product_price=='' or $product_image==''){
    //     echo "<script>alert('Please fill all available fields')</script>";
    //     exit();
    // }   
    // {
    move_uploaded_file($temp_image, "./puploads/$product_image");

    $insert_products = "insert into `products` (product_name, product_description, category_id, product_image, product_price, date, status) values ('" . $product_title . "','" . $description . "','" . $product_category . "','" . $product_image . "','" . $product_price . "', NOW(), '" . $product_status . "')";
    $result_query = mysqli_query($con, $insert_products);
    if ($result_query) {
        echo "<script>alert('Successfully Insert')</script>";
    } else {
        echo "<script>alert('Failed')</script>";
    }
    // }
}
?>

<h1 class="text-center">Insert Product</h1>

<div class="card" style="margin-left: 60px; margin-right: 60px;">
    <div class="card-header">
        <div class="card-body">
            <!-- form -->
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Product Name -->
                <div class="form-outline mb-4 mt-4 w-50 m-auto">
                    <label for="product_title" class="form-label">Product Title</label>
                    <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Name" autocomplete="off" required="required">
                </div>
                <!-- product Description -->
                <div class="form-outline mb-4 mt-4 w-50 m-auto">
                    <label for="description" class="form-label">Product Description</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
                </div>
                <!-- Catarories -->
                <div class="form-outline mb-4 mt-4 w-50 m-auto">
                    <select name="product_category" id="" class="form-select">
                        <option value="">Select a Category</option>
                        <?php
                        $select_query = "Select * from `categories`";
                        $result_query = mysqli_query($con, $select_query);
                        while ($row = mysqli_fetch_assoc($result_query)) {
                            $category_title = $row['category_name'];
                            $category_id = $row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                        ?>
                    </select>
                </div>
                <!-- Images-->
                <div class="form-outline mb-4 mt-4 w-50 m-auto">
                    <label for="product_image" class="form-label">Product Image</label>
                    <input type="file" name="product_image" id="product_image" class="form-control" required="required">
                </div>
                <!-- Price -->
                <div class="form-outline mb-4 mt-4 w-50 m-auto">
                    <label for="product_price" class="form-label">Product Price</label>
                    <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required="required">
                </div>
                <!-- Button -->
                <div class="form-outline mb-4 mt-4 w-50 m-auto">
                    <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
                    <a href="adminindex.php" class="btn btn-info mb-3 px-3">GO BACK</a>
                </div>

            </form>
        </div>
    </div>
</div>
