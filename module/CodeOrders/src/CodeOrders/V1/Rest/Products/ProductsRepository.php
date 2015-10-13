<?php
namespace CodeOrders\V1\Rest\Products;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Paginator\Adapter\DbTableGateway;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\ObjectProperty;


class ProductsRepository
{
    /**
     * @var TableGatewayInterface
     */
    private $tableGateway;

    /**
     * ProductsRepository constructor.
     */
    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function findAll(){

        $tableGateway = $this->tableGateway;
        $paginatorAdapter = new DbTableGateway($tableGateway);

        return new ProductsCollection($paginatorAdapter);

    }

    public function find($id){

        $resultSet = $this->tableGateway->select(['id'=>(int)$id]);

        return $resultSet->current();

    }

    public function create($data){

        $mapper = new ObjectProperty();
        $data = $mapper->extract($data);

        $this->tableGateway->insert($data);
        $data['id'] = $this->tableGateway->getLastInsertValue();

        return $data;

    }

    public function delete($id){

        return $this->tableGateway->delete(['id' => (int)$id]);

    }

    public function patch($id, $data){

        $alterar = [];
        foreach($data as $key => $dados) {
            $alterar[$key] = $dados;
        };

        return $this->tableGateway->update($alterar,['id'=>$id]);

    }

    public function update($id, $data){

        $mapper = new ProductsMapper();
        return $this->tableGateway->update($mapper->extract($data),['id'=>$id]);

    }


}
