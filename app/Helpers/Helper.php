
<?php   

use App\Models\Product;

function calculateTotalPrice($productId,$quantity)
{ 
    $product = Product::find($productId);
    return $product->sale_price * $quantity;
}