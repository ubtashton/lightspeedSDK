<?php

namespace UbtAshton\Lightspeed\Resources;

use UbtAshton\Lightspeed\Resources\HasVersions;
use UbtAshton\Lightspeeed\Resources\CastsCollection;
use Spatie\DataTransferObject\DataTransferObject;

class ProductCollection extends DataTransferObject{
    use CastsCollection, HasVersions;

    public function current(): Product{
        return parent::current(); 

    }
}