<?php
function getOrders(){
    $sql = "SELECT * FROM orders ORDER BY 'session_id'";
    $orders = getAssocResult($sql);
    return $orders;
}