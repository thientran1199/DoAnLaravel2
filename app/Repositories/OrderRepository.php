<?php
namespace App\Repositories;
use App\Models\Order;

class OrderRepository extends BaseRepository{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function all(){
        return $this->order->all();
    }

   
}
