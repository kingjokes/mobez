<?php

namespace App\Interfaces;



interface OrdersInterface
{

    public function getOrders();

    public function deleteOrder(int $id);

    public function updateOrder(int $id, int $status);


    public function orderDetails(int $id);
    

    public function addOrder(array $details);

}
