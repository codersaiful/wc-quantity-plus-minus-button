<?php
namespace WQPMB\Core;

defined('ABSPATH') || exit;

class Base
{
    public $_root = __CLASS__;
    public $plugin_prefix = 'wqpmb';
    public $dev_version = WQPMB_VERSION;
    public $base_url = WQPMB_BASE_URL;
    public $base_dir = WQPMB_BASE_DIR;
    public $assets_url = WQPMB_BASE_URL . 'assets/';

    public $data_packed;

    /**
     * For non-exist property
     *
     * @param string $name
     * @return [any]|string|null|boolean|bool|object|int|float|this|null
     */
    public function __get( $name ){
        return $this->data_packed[$name] ?? null;
    }

    /**
     * For non exist property
     *
     * @param string $name
     * @param [any]|string|null|boolean|bool|object|int|float|this|null $value
     */
    public function __set($name, $value){
        $this->data_packed[$name] = $value;
    }
}