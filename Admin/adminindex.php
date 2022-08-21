<!-- CONNECT FILE -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>

    <style>
        .product_img{
            width:100px;
            object-fit:contain;
        }
    </style>

</head>

<body>
    <!-- navbar-->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../uploads/logo.jpg" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center">Manage Details</h3>
        </div>
        <!-- third child -->
        <div class="row">
            <div class="col md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../uploads/admin.jpg" alt="" class="adminimage"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button class="my-"><a href="adminindex.php?insert_product" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                    <button><a href="adminindex.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                    <button><a href="adminindex.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                    <button><a href="adminindex.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
                    <button><a href="adminindex.php?users_list" class="nav-link text-light bg-info my-1">List Users</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>

            <!--fourth child-->
            <div class="container my-3">
                <?php
                if (isset($_GET['insert_category'])) {
                    include('insert_categories.php');
                }

                if (isset($_GET['insert_product'])) {
                    include('insert_product.php');
                }

                if (isset($_GET['view_products'])) {
                    include('view_products.php');
                }

                if (isset($_GET['edit_products'])) {
                    include('edit_products.php');
                }

                if (isset($_GET['delete_product'])) {
                    include('delete_product.php');
                }

                if (isset($_GET['view_categories'])) {
                    include('view_categories.php');
                }

                if (isset($_GET['edit_category'])) {
                    include('edit_category.php');
                }

                if (isset($_GET['delete_category'])) {
                    include('delete_category.php');
                }

                if (isset($_GET['users_list'])) {
                    include('users_list.php');
                }
                ?>
            </div>

        </div>
        <?php include("../includes/footer.php") ?>
    </div>



    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>