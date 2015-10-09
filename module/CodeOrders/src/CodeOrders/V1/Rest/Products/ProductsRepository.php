<?php
namespace CodeOrders\V1\Rest\Products;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Paginator\Adapter\DbTableGateway;


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

        $mapper = new ProductsMapper();
        return $this->tableGateway->insert($mapper->extract($data));

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
