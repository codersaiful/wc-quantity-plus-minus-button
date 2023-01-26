<?php
namespace WQPMB\Includes;

use WQPMB;
use WQPMB\Includes\Features\Quantiy_Archive;

class Feature_Loader
{

    public static $option_key;
    public static $options;
    public static function run()
    {
        self::$option_key = \WQPMB_Button::$option['option'] ?? '';
        
        self::$options = get_option( self::$option_key );// WC_MMQ::getOptions();
        
        self::$options['quantiy_box_archive'] = 1;
        $quantiy_archive = self::$options['quantiy_box_archive'] ?? false;
        if( ! empty( $quantiy_archive ) && $quantiy_archive == 1 ){
            $quantiy_archive_obj = new Quantiy_Archive();
            $quantiy_archive_obj->run();
        }
    }
}