<?php

namespace UbtAshton\Lightspeed\Actions;

use UbtAshton\Lightspeed\Resources\Version;
use UbtAshton\Lightspeed\Lightspeed;

class ManagesResources {


    private $lightspeed;

    public function __construct(Lightspeed $lightspeed){
        $this->lightspeed = $lightspeed;
    }

    private function collection(string $collection, string $endpoint, array $query = [], string $root = 'data')
    {
        $query = array_filter($query, function ($value) {
            return ! is_null($value);
        });

        $response = $this->vend->get($endpoint, $query);

        $collection = new $collection($response[$root]);

        if (property_exists($collection, 'version') && isset($response['version'])) {
            $collection->version = new Version($response['version']);
        }

        return $collection;
    }

    private function createResource(
        string $resource,
        string $endpoint,
        array $body,
        $root = 'data',
        $payload_root = null
    ){
        $response=$this->lightspeed->post($endpoint, $body, 'json', true, $payload_root);

        if(is_null($root)){
            return new $resource($response);
        }

        return new $resource($response[$root]);
    }

    private function deleteResource(string $endpoint): bool{
        $this->lightspeed->delete($endpoint);
        return true;
    }

    private function getResource(string $resource, string $endpoint, string $root = 'data'){
        $response = $this->lightspeed->get($endpoint);
        return new $resource($response[$root]);
    }

    private function updateResource(string $resource, string $endpoint, array $body, string $root = 'data'){
        $response = $this->lightspeed->put($endpoint, $body, 'json');
        return new $resource($response[$root]);
    }


}