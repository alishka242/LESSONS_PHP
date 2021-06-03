<?php
function getProduct($id)
{
    $product = getOneResult("SELECT * FROM products WHERE id ={$id}");

    return $product;
}
