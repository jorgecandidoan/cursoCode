<?php
namespace CodeOrders\V1\Rest\Products;

use Zend\Stdlib\Hydrator\HydratorInterface;

class ProductsMapper extends ProductsEntity implements HydratorInterface
{
    public function extract($object)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price
        ];
    }

    public function hydrate(array $data, $object)
    {
        $object->id = $data['id'];
        $object->name = $data['name'];
        $object->description = $data['description'];
        $object->price = $data['price'];

        return $object;
    }
}
