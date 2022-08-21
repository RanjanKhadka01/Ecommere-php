<?php
// include('./includes/connect.php');

// Recommendation product
function recommendation()
{
	if (!isset($_GET['category'])) {
	global $con;
		$user_id = getIPAddress();
		$search_query = mysqli_query($con, "Select * from search_by_user where user_id = '" . $user_id . "' 
		order by created_at");
		$row_count = mysqli_num_rows($search_query);
		//echo $row_count; die;
		if ($row_count > 0) {
			$select_query = "Select * from `products` where category_id IN (
				select category_id from search_by_user) order by date DESC";

			$result_query = mysqli_query($con, $select_query);
			$row_count_for_products = mysqli_fetch_assoc($result_query);

			if($row_count_for_products > 0)
			{
				while ($row = mysqli_fetch_assoc($result_query)) {
					$product_id = $row['product_id'];
					$product_title = $row['product_name'];
					$product_description = $row['product_description'];
					$product_image = $row['product_image'];
					$product_price = $row['product_price'];
					$category_id = $row['category_id'];
	
	
					echo "<div class='col-md-3 mb-2'>
					
					<div class='card'>	
					<h6 class='text-center bg-info'>Product you may like</h6>			
						<img src='./admin/puploads/$product_image' class='card-img-top' alt='$product_title'>
						<div class='card-body'>
						<h5 class='card-title'>$product_title</h5>
						<p class='card-title'>Price: $product_price/-</p>
						<a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
						<a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
						</div>
					</div>
					</div>
					";
				}
			}

			else {
				//
			}
			
		}

		else {

			//
		}
	}
}

//getting products
function getproducts()
{
	global $con;

	// condition to check isset or not
	if (!isset($_GET['category'])) {

		// $user_id = getIPAddress();

		// $search_query = mysqli_query($con, "select * from search_by_user where user_id = '" . $user_id . "' order by created_at");

		// $row_count = mysqli_num_rows($search_query);

		// if ($row_count > 0) {
		// 	$select_query = "select * from  `products` where category_id IN (
		// 	select category_id from search_by_user)";
		// } else {
		$select_query = "select * from  `products` order by rand() ";
		//}

		$result_query = mysqli_query($con, $select_query);
		// $row=mysqli_fetch_assoc($result_query);
		while ($row = mysqli_fetch_assoc($result_query)) {
			$product_id = $row['product_id'];
			$product_title = $row['product_name'];
			$product_description = $row['product_description'];
			$product_image = $row['product_image'];
			$product_price = $row['product_price'];
			$category_id = $row['category_id'];
			echo "<div class='col-md-3 mb-2'>
				<div class='card'>
					<img src='./admin/puploads/$product_image' class='card-img-top' alt='$product_title'>
					<div class='card-body'>
					<h5 class='card-title'>$product_title</h5>
					<p class='card-title'>Price: $product_price/-</p>
					<a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
					<a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
					</div>
				</div>
			</div>";
		}
	}
}

// // displaying all products
function get_all_products()
{
	global $con;

	// condition to check isset or not
	if (!isset($_GET['category'])) {

		$select_query = "select * from  `products` order by rand()";
		$result_query = mysqli_query($con, $select_query);
		// $row=mysqli_fetch_assoc($result_query);
		while ($row = mysqli_fetch_assoc($result_query)) {
			$product_id = $row['product_id'];
			$product_title = $row['product_name'];
			$product_description = $row['product_description'];
			$product_image = $row['product_image'];
			$product_price = $row['product_price'];
			$category_id = $row['category_id'];
			echo " <div class='col-md-3 mb-2'>
<div class='card'>
  <img src='./admin/puploads/$product_image' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-title'>Price: $product_price/-</p>
  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
  <a href='product_details.php?product_id=$$product_id' class='btn btn-secondary'>View More</a>
  </div>
</div>
</div>";
		}
	}
}

//getting unique category
function get_unique_categories()
{
	global $con;

	// condition to check isset or not
	if (isset($_GET['category'])) {
		$category_id = $_GET['category'];

		$select_query = "select * from  `products` where category_id=$category_id";
		$result_query = mysqli_query($con, $select_query);
		$num_of_rows = mysqli_num_rows($result_query);
		if ($num_of_rows == 0) {
			echo "<h2 class='text-center text-danger'>No Stock for this category</h2>";
		}
		while ($row = mysqli_fetch_assoc($result_query)) {
			$product_id = $row['product_id'];
			$product_title = $row['product_name'];
			$product_description = $row['product_description'];
			$product_image = $row['product_image'];
			$product_price = $row['product_price'];
			$category_id = $row['category_id'];
			echo " <div class='col-md-4 mb-2'>
<div class='card'>
  <img src='./admin/puploads/$product_image' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-title'>Price: $product_price/-</p>
  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
  <a href='product_details.php?product_id=$$product_id' class='btn btn-secondary'>View More</a>
  </div>
</div>
</div>";
		}
	}
}



//displaying categories
function getcategories()
{
	global $con;
	$select_categories = "Select * from `categories`";
	$result_categories = mysqli_query($con, $select_categories);
	while ($row_data = mysqli_fetch_assoc($result_categories)) {
		$category_title = $row_data['category_name'];
		$category_id = $row_data['category_id'];
		echo "<li class='nav-item'>
    <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
    </li>";
	}
}

//searching products function
function search_products()
{

	global $con;
	if (isset($_GET['search_data_product'])) {
		$search_data_value = $_GET['search_data'];
		$search_query = "Select * from `products` where product_name like '%$search_data_value%'";
		$result_query = mysqli_query($con, $search_query);
		$num_of_rows = mysqli_num_rows($result_query);
		if ($num_of_rows == 0) {
			echo "<h2 class='text-center text-danger'>No result match. No products found for this category!</h2>";
		}
		while ($row = mysqli_fetch_assoc($result_query)) {
			$product_id = $row['product_id'];
			$product_title = $row['product_name'];
			$product_description = $row['product_description'];
			$product_image = $row['product_image'];
			$product_price = $row['product_price'];
			$category_id = $row['category_id'];
			echo " <div class='col-md-4 mb-2'>
<div class='card'>
    <img src='./admin/puploads/$product_image' class='card-img-top' alt='$product_title'>
    <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-title'>Price: $product_price/-</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
    <a href='product_details.php?product_id=$$product_id' class='btn btn-secondary'>View More</a>
    </div>
</div>
</div>";
		}
	}
}


// function to get category
function getUniqueCategory($product)
{
	global $con;

	$select_query = "select category_id from products where product_id = '" . $product . "'";

	$result_query = mysqli_query($con, $select_query);

	while ($row = mysqli_fetch_assoc($result_query)) {
		$category = $row['category_id'];
	}

	return $category;
}

// insert search data
function insert_search_data($product)
{
	global $con;

	$category = getUniqueCategory($product);
	$get_ip_add = getIPAddress();

	$insert_query = "INSERT INTO `search_by_user`(`user_id`, `category_id`, `created_at`) 
                      VALUES ('" . $get_ip_add . "','" . $category . "',NOW())";
	$sql_execute = mysqli_query($con, $insert_query);
	return;
}


// View Details Function
function view_details()
{
	global $con;

	// condition to check isset or not
	if (isset($_GET['product_id'])) {
		if (!isset($_GET['category'])) {
			$product_id = $_GET['product_id'];
			insert_search_data($product_id);
			//echo $product_id; die;
			$select_query = "select * from products where product_id=$product_id";
			//echo $select_query;
			$result_query = mysqli_query($con, $select_query);
			//echo $result_query;
			while ($row = mysqli_fetch_assoc($result_query)) {
				$product_id = $row['product_id'];
				$product_title = $row['product_name'];
				$product_description = $row['product_description'];
				$product_image = $row['product_image'];
				$product_price = $row['product_price'];
				$category_id = $row['category_id'];
				echo " <div class='col-md-4 mb-2'>
	<div class='card'>
    	<img src='./admin/puploads/$product_image' class='card-img-top' alt='$product_title'>
		<div class='card-body'>
			<h5 class='card-title'>$product_title</h5>
			<p class='card-title'>Price: $product_price/-</p>
			<a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
			<a href='index.php' class='btn btn-secondary'>Go Home</a>
		</div>
	</div>
</div>

<div class='col-md-8'>
<div class='row'>
  <div class='col-md-12'>
    <h4 class='text-center text-info mb-5'>Product Description</h4>
    <h4 class='text-center mb-5'>$product_description</h4>    
  </div>
</div>
</div>


";
			}
		}
	}
}



// get ip address function 
function getIPAddress()
{
	//whether ip is from the share internet  
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}
	//whether ip is from the proxy  
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	//whether ip is from the remote address  
	else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

//add cart function
function cart()
{
	if (isset($_GET['add_to_cart'])) {
		global $con;
		$get_ip_add = getIPAddress();
		$get_product_id = $_GET['add_to_cart'];
		$select_query = "Select * from `cart_details` where ip_address='$get_ip_add' and product_id=$get_product_id";
		$result_query = mysqli_query($con, $select_query);
		$num_of_rows = mysqli_num_rows($result_query);
		if ($num_of_rows > 0) {
			echo "<script>alert('This item is already present inside cart')</script>";
			echo "<script>window.open('index.php','_self')</script>";
		} else {
			$insert_query = "insert into `cart_details` (product_id, ip_address, quantity) values ($get_product_id, '$get_ip_add', 0)";
			$result_query = mysqli_query($con, $insert_query);
			echo "<script>alert('Item is added to cart')</script>";
			echo "<script>window.open('index.php','_self')</script>";
		}
	}
}

// function to get cart items
function cart_items()
{
	if (isset($_GET['add_to_cart'])) {
		global $con;
		$get_ip_add = getIPAddress();
		$select_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
		$result_query = mysqli_query($con, $select_query);
		$count_cart_items = mysqli_num_rows($result_query);
	} else {
		global $con;
		$get_ip_add = getIPAddress();
		$select_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
		$result_query = mysqli_query($con, $select_query);
		$count_cart_items = mysqli_num_rows($result_query);
	}
	echo $count_cart_items;
}

// Total Price Function
function total_cart_price()
{
	global $con;
	$get_ip_add = getIPAddress();
	$total_price = 0;
	$cart_query = "Select * from  `cart_details` where ip_address='$get_ip_add'";
	$result = mysqli_query($con, $cart_query);
	while ($row = mysqli_fetch_array($result)) {
		$product_id = $row['product_id'];
		$select_products = "Select * from  `products` where product_id='$product_id'";
		$result_products = mysqli_query($con, $select_products);
		while ($row_product_price = mysqli_fetch_array($result_products)) {
			$product_price = array($row_product_price['product_price']);
			$product_values = array_sum($product_price);
			$total_price += $product_values;
		}
	}
	echo $total_price;
}

// get user order details
function get_user_order_details()
{
	global $con;
	$username = $_SESSION['username'];
	$get_details = "Select * from `user_table` where username='$username'";
	$result_query = mysqli_query($con, $get_details);
	while ($row_query = mysqli_fetch_array($result_query)) {
		$user_id = $row_query['user_id'];
		if (!isset($_GET['edit_account'])) {
			if (!isset($_GET['my_orders'])) {
				if (!isset($_GET['delete_account'])) {
					$get_orders = "Select * from `user_orders` where user_id=$user_id and order_status='pending'";
					$result_orders_query = mysqli_query($con, $get_orders);
					$row_count = mysqli_num_rows($result_orders_query);
					if ($row_count > 0) {
						echo "<h3 class='text-center text-success my-5 mb-2'>You have <span class='text-danger'> $row_count </span> pending orders.</h3>
            <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
					} else {
						echo "<h3 class='text-center text-success my-5 mb-2'>You have zero pending orders</h3>
            <p class='text-center'><a href='../index.php?my_orders' class='text-dark'>Explore Products </a></p>";
					}
				}
			}
		}
	}
}
