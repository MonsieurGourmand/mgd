<?php
/**
 * Created by PhpStorm.
 * User: remi
 * Date: 1/20/17
 * Time: 6:10 PM
 */

namespace Mgd\Route\Order;

use Mgd\Entity\Order;
use Mgd\Entity\Purchase;
use Mgd\Mgd;

class PurchaseProduct
{
    public function __construct(Purchase $purchase)
    {
        $this->master = $purchase->getMaster();
        $this->entity = \Mgd\Entity\PurchaseProduct::class;
        $this->url = "/purchases/".$purchase->getIdOrder()."/products";
    }

    public function getAll($format=\Mgd\Mgd::FORMAT_OBJECT)
    {
        $params = array();
        return $this->master->getAll($this->url, $this->entity,$params,$format);
    }

    public function get($id,$format=\Mgd\Mgd::FORMAT_OBJECT)
    {
        return $this->master->get($this->url,$id,$this->entity,$format);
    }

    public function post(\Mgd\Entity\OrderProduct $orderProduct,$format=\Mgd\Mgd::FORMAT_OBJECT)
    {
        return $this->master->post($this->url,$orderProduct,$this->entity,$format);
    }

    public function put(\Mgd\Entity\OrderProduct $orderProduct,$format=\Mgd\Mgd::FORMAT_OBJECT)
    {
        return $this->master->put($this->url,$orderProduct->getIdOrderProduct(),$orderProduct,$this->entity,$format);
    }

    public function remove(\Mgd\Entity\OrderProduct $orderProduct)
    {
        return $this->master->remove($this->url,$orderProduct->getIdOrderProduct());
    }


}