<?php

namespace UbtAshton\Lightspeed\Actions;

class ProductsManager {

    use ManagesResources;


    public function create($product):  \UbtAshton\Lightspeed\Resources\Product{
        //Create a new product
        $this->createResource(resource: \UbtAshton\Lightspeed\Resources\Product::class, endpoint: 'products', body: $product);
    }

    public function delete(string $id): bool{
        return $this->deleteResource(endpoint: "products/$id");
    }



}