<?php
namespace App\Repositories;

use App\Models\Order_detail;


class OrderDetailRepository extends BaseRepository{
    protected $orderdetail;

    public function __construct(Order_detail $orderdetail)
    {
        $this->orderdetail = $orderdetail;
    }

    public function all(){
        return $this->orderdetail->all();
    }

   
}
