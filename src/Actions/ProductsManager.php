<?php

namespace UbtAshton\Lightspeed\Actions;

use UbtAshton\Lightspeed\Resources\ProductCollection;

class ProductsManager {

    use ManagesResources;


    public function create($product):  \UbtAshton\Lightspeed\Resources\Product{
        //Create a new product
        $this->createResource(resource: \UbtAshton\Lightspeed\Resources\Product::class, endpoint: 'products', body: $product);
    }

    public function delete(string $id): bool{
        return $this->deleteResource(endpoint: "products/$id");
    }

    public function getSingle(string $id): \UbtAshton\Lightspeed\Resources\Product{
        return $this->getResource(resource: \UbtAshton\Lightspeed\Resources\Product::class, endpoint: "products/$id");
    }

    public function get(
        int $page_size = null,
        int $after = null,
        int $before = null,
        bool $deleted = null
    ): ProductCollection{
        return $this->collection(ProductCollection:: class, '2.0/products',
        compact('page_size', 'after', 'before', 'deleted'));

    }


    



}