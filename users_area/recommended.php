<?php
echo "<div class='col-md-3 mb-2'>
<div class='card'>
<h4> Recommended Products</h4>
    <img src='./admin/puploads/$product_image' class='card-img-top' alt='$product_title'>
    <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-title'>Price: $product_price/-</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
    </div>
</div>
</div>";
?>