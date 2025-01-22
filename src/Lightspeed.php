<?php

namespace UbtAshton\Lightspeed;

use GuzzleHttp\Client;
use UbtAshton\Lightspeed\Resources\Token;

class Lightspeed
{
    public $guzzle;
    public $token;


    //constructor
    private function __construct(){
        $this->guzzle = new Client([
            'http_errors' => false,
            'verify' => true,
            'headers' => [
                'Content-Type' => 'application/json',]
        ]);

        $this->token = new Token([]);
    }

    //loading in a token
    public function loadToken(Token $token){
        $this->token = new Token($token);
        return $this;
    }

    //set domain prefix
    public function setDomainPrefix($domain_prefix){
        $this->token->domain_prefix = $domain_prefix;
        return $this;
    }

    public static function getInstance(){
        return new Lightspeed();
    }








}