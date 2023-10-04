<?php
namespace WQPMB\Core;

defined('ABSPATH') || exit;

abstract class Base
{
    public $_root = __CLASS__;
    public $plugin_prefix = 'wqpmb';
    public $dev_version = WQPMB_VERSION;
    public $base_url = WQPMB_BASE_URL;

    /**
     * No right slash at the end 
     * So if want to use any where, add right slash at the end
     *
     * @var string
     */
    public $base_dir = WQPMB_BASE_DIR;
    public $assets_url = WQPMB_BASE_URL . 'assets/';

    public $option_key;
    public $data;

    public $data_packed;

    public function __construct()
    {
        $this->option_key = \WQPMB_Button::$option['option'];
        $this->data = get_option( $this->option_key);
    }

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