<?php
namespace CodeOrders\V1\Rest\Orders;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Stdlib\Hydrator\ClassMethods;

class OrdersRepository
{
    /**
     * @var AbstractTableGateway
     */
    private $tableGateway;
    /**
     * @var AbstractTableGateway
     */
    private $orderItemTableGateway;


    /**
     * OrdersRepository constructor.
     */
    public function __construct(AbstractTableGateway $tableGateway, AbstractTableGateway $orderItemTableGateway)
    {
        $this->tableGateway = $tableGateway;
        $this->orderItemTableGateway = $orderItemTableGateway;
    }

    public function findAll(){

        $hydrator = new ClassMethods();
        $hydrator->addStrategy('items',new OrderItemsHydratorStrategy($hydrator));
        $orders = $this->tableGateway->select();
        $res = [];

        foreach ($orders as $order){
            $items = $this->orderItemTableGateway->select(['order_id' => $order->getId()]);
            foreach($items as $item){
                $order->addItems($item);
            }

            $data = $hydrator->extract($order);
            $res[] = $data;
        }

        $arrayAdapter = new ArrayAdapter($res);
        $orderCollections = new OrdersCollection($arrayAdapter);

        return $orderCollections;
    }

    public function insert(array $data){

        $this->tableGateway->insert($data);
        $orderId = $this->tableGateway->getLastInsertValue();

        return $orderId;
    }

    public function insertItem(array $data){
        $this->orderItemTableGateway->insert($data);
        return $this->orderItemTableGateway->getLastInsertValue();
    }

    public function getTableGateway(){
        return $this->tableGateway;
    }
}