<?php
//this will be a single php file to talk to lightspeed


namespace ubtashton\LightspeedSDK;

require_once 'vendor/autoload.php';

use GuzzleHttp\Client;

class lightspeed
{

    public $store;
    public $token;
    public $clientid;
    public $clientsecret;
    public function __construct($store, $token, $clientid, $clientsecret)
    {
        $this->store = $store;
        $this->token = $token;
        $this->clientid = $clientid;
        $this->clientsecret = $clientsecret;

        //echo 'Lightspeed class loaded';
    }


    //actions we need to perform:
    //1. Get all products
    //2. Get a single product
    //3. Get all Customers
    //4. Get a single customer
    //5. Get all Orders
    //6. Get a single order
    //7. Get all Categories
    //8. Get a single category



    //setup a function for get requests
    public function get($resource)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://' . $this->store . '.retail.lightspeed.app/' . $resource, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token]
            ]);
        return json_decode($response->getBody());
    }

    //queries required for store setup etc

    //get Retailer function, to get information about the retailer
    function getRetailer()
    {
        return $this->get('api/2.0/retailer')->data;
    }

    //get versions - useful to get the current version of certain elements on the api
    function getVersions()
    {
        return $this->get('api/2.0/versions')->data;
    }

    //get outlets
    function getOutlets()
    {
        return $this->get('api/2.0/outlets');
    }

    //get registers
    function getRegisters()
    {
        return $this->get('api/2.0/registers');
    }

    //get paymenttypes
    function getPaymentTypes()
    {
        return $this->get('api/2.0/payment_types');
    }


    //get auth token (used to get a token after returning from the oauth process)
    function getAuthToken($code, $redirect)
    {
        $client = new Client();
        $response = $client->request('POST', 'https://' . $this->store . '.retail.lightspeed.app/api/1.0/token', [
            'form_params' => [
                'client_id' => $this->clientid,
                'client_secret' => $this->clientsecret,
                'code' => $code,
                'grant_type' => 'authorization_code',
                'redirect_uri' => $redirect
            ]
        ]);
        return json_decode($response->getBody());
    }


    function refreshAuthToken($refresh_token)
    {
        $client = new Client();
        $response = $client->request('POST', 'https://' . $this->store . '.retail.lightspeed.app/api/1.0/token', [
            'form_params' => [
                'client_id' => $this->clientid,
                'client_secret' => $this->clientsecret,
                'refresh_token' => $refresh_token,
                'grant_type' => 'refresh_token'
            ]
        ]);
        return json_decode($response->getBody());
    }
















    //operational queries

    //get customers - has a page_size, after and deleted parameter
    function getCustomers($page_size = 1000, $after = 0, $deleted = false)
    {
        return $this->get('api/2.0/customers?page_size=' . $page_size . '&after=' . $after . '&deleted=' . $deleted);
    }

    //get product categories - has a page_size, after, parent, and include parameter
    function getCategories($page_size = 1000, $after = 0, $parent = false, $include = 'family')
    {
        $query = '';
        $query .= '?page_size=' . $page_size;
        if ($after > 0) {
            $query .= '&after=' . $after;
        }
        if ($parent) {
            $query .= '&parent=' . $parent;
        }
        if ($include) {
            $query .= '&include=' . $include;
        }
        return $this->get('api/2.0/product_categories' . $query);
    }


    //get brands - has an after, and page_size parameter
    function getBrands($page_size = 1000, $after = 0)
    {
        $query = '';
        $query .= '?page_size=' . $page_size;
        if ($after > 0) {
            $query .= '&after=' . $after;
        }
        return $this->get('api/2.0/brands' . $query);
    }


    //get products - has an after, page_size, deleted, sku, name, and family_name parameter
    function getProducts($page_size = 1000, $after = 0, $deleted = false, $sku = false, $name = false, $family_name = false)
    {
        $query = '';
        $query .= '?page_size=' . $page_size;
        if ($after > 0) {
            $query .= '&after=' . $after;
        }
        if ($deleted) {
            $query .= '&deleted=' . $deleted;
        }
        if ($sku) {
            $query .= '&sku=' . $sku;
        }
        if ($name) {
            $query .= '&name=' . $name;
        }
        if ($family_name) {
            $query .= '&family_name=' . $family_name;
        }
        return $this->get('api/2.0/products' . $query);
    }


    //get product - has a product_id parameter
    function getProduct($product_id)
    {
        return $this->get('api/2.0/products/' . $product_id);
    }


    //get pricebooks - has a page_size and after parameter
    function getPricebooks($page_size = 1000, $after = 0)
    {
        $query = '';
        $query .= '?page_size=' . $page_size;
        if ($after > 0) {
            $query .= '&after=' . $after;
        }
        return $this->get('api/3.0/price_books' . $query);
    }

    //get a single pricebook
    function getPricebook($pricebook_id)
    {
        return $this->get('api/2.0/price_books/' . $pricebook_id);
    }


    //get products by pricebook
    function getPricebookProductsByPricebook($pricebook_id, $page_size = 1000, $after = 0)
    {
        $query = '';
        $query .= '?page_size=' . $page_size;
        if ($after > 0) {
            $query .= '&after=' . $after;
        }
        return $this->get('api/2.0/price_books/' . $pricebook_id . '/products' . $query);
    }

    //get pricebookproducts - has a page_size, after parameter
    function getPricebookProducts($page_size = 1000, $after = 0)
    {
        $query = '';
        $query .= '?page_size=' . $page_size;
        if ($after > 0) {
            $query .= '&after=' . $after;
        }
        return $this->get('api/2.0/price_book_products' . $query);
    }




        


}
