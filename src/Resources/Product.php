<?php

namespace UbtAshton\Lightspeed\Resources;


class Product {


    //id: string|null
    public $id;

    //source_id: string|null
    public $source_id;

    //source_variant_id: string|null
    public $source_variant_id;

    //variant_parent_id: string|null
    public $variant_parent_id;

    //name: string|null
    public $name;

    //variant_name: string|null
    public $variant_name;

    //handle: string|null
    public $handle;

    //sku: string|null
    public $sku;

    //supplier_code: string|null
    public $supplier_code;

    //active: bool|null
    public $active;

    //has_inventory: bool|null
    public $has_inventory;

    //is_composite: bool|null
    public $is_composite;

    //description: string|null
    public $description;

    //image_url: string|null
    public $image_url;

    //created_at: string|null
    public $created_at;

    //updated_at: string|null
    public $updated_at;

    //deleted_at: string|null
    public $deleted_at;

    //source: string|null
    public $source;

    //account_code: string|null
    public $account_code;

    //account_code_purchase: string|null
    public $account_code_purchase;

    //supply_price: float|null
    public $supply_price;

    //version: int|null
    public $version;

    //type: UbtAshton\Lightspeed\Resources\ProductType|null
    public $type;

    //product_category: mixed|null
    public $product_category;

    //supplier: UbtAshton\Lightspeed\Resources\Supplier|null
    public $supplier;

    //brand: UbtaAshton\Lightspeed\Resources\Brand|null
    public $brand;

    //variant_options: UbtAshton\Lightspeed\Resources\VariantOption[]|null
    public $variant_options;

    //categories: mixed|null -- maybe this should be the tags resource?
    public $categories;

    //images: UbtAshton\Lightspeed\Resources\Image[]|null
    public $images;

    //skuImages: mixed|null
    public $skuImages;

    //has_variants: bool|null
    public $has_variants;

    //variant_count: int|null
    public $variant_count;

    //button_order: int|null
    public $button_order;

    //price_including_tax: float|null
    public $price_including_tax;

    //price_excluding_tax: float|null
    public $price_excluding_tax;

    //loyalty_amount: float|null
    public $loyalty_amount;

    //product_codes: mixed|null
    public $product_codes;
    
    //product_suppliers: mixed|null
    public $product_suppliers;

    //packaging: mixed|null
    public $packaging;

    //weight: mixed|null
    public $weight;

    //weight_unit: mixed|null
    public $weight_unit;

    //length: mixed|null
    public $length;

    //width: mixed|null
    public $width;

    //height: mixed|null
    public $height;

    //dimension_unit: mixed|null
    public $dimension_unit;

    //attributes: mixed|null
    public $attributes;

    //supplier_id: string|null
    public $supplier_id;

    //is_active: bool|null
    public $is_active;

    //image_thumbnail_url: string|null
    public $image_thumbnail_url;

    //tag_ids: mixed|null
    public $tag_ids;

    //product_type_id: string|null
    public $product_type_id;

    //brand_id: string|null
    public $brand_id;







}