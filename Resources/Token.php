<?php

namespace UbtAshton\Lightspeed\Resources;

class Token{

    //Access token.
    // Type: string|null
    public $access_token;

    //Domain Prefix
    // Type: string|null
    public $domain_prefix;

    //Expires
    public $expires;

    //Expires in
    // Type: int|float|null
    public $expires_in;

    //refresh token
    //type: string|null
    public $refresh_token;

    //token type
    //type: string|null
    public $token_type;

    //scope
    //type: string|null
    public $scope;


}