<?php 
namespace WQPMB\Framework;

use CA_Framework\App\Notice as Notice;
use CA_Framework\App\Require_Control as Require_Control;

include_once __DIR__ . '/ca-framework/framework.php';

class Recommeded
{
    public static $base_file = 'wc-quantity-plus-minus-button/init.php';
    public static function check()
    {
        $randN = rand(1,2);
        $this_plugin = __( 'Plus Minus Button', 'wqpmb' );
        
        $mmp_req_slug = 'woo-product-table/woo-product-table.php';
        $mmp_tar_slug = self::$base_file;
        $req_mmp = new Require_Control($mmp_req_slug,$mmp_tar_slug);
        $req_mmp->set_args( ['Name' => 'Product Table for WooCoomerce by CodeAstrology'] )
        ->set_download_link('https://wordpress.org/plugins/woo-product-table/')
        ->set_this_download_link('https://wordpress.org/plugins/wc-quantity-plus-minus-button');
        $mmp_message = __('%s Product Table plugin helps you to display your WooCommerce products in a searchable table layout with filters. Add a table on any page or post via a shortcode. You can create tables as many as you want.','wcmmq');
        $wpt_link = "<a href='https://wooproducttable.com/' target='_blank'>(Woo Product Table)</a>";
        $mmp_message = sprintf($mmp_message, $wpt_link);
        $req_mmp->set_message($mmp_message);
        $req_mmp->get_full_this_plugin_name($this_plugin);
        // var_dump(method_exists($req_mmp, 'set_location'),$req_mmp);
        // ->set_required();
        if( method_exists($req_mmp, 'set_location') ){
            if($randN == 1){
                $req_mmp->set_location('wqpmb_plugin_recommend_top');
                $req_mmp->run();
            }
            

            $req_mmp->set_location('wqpmb_plugin_recommend_here'); //wpt_premium_image_bottom
            $req_mmp->run();
        }


        $mmp_req_slug = 'woo-min-max-quantity-step-control-single/wcmmq.php';
        $mmp_tar_slug = self::$base_file;
        $req_mmp = new Require_Control($mmp_req_slug,$mmp_tar_slug);
        $req_mmp->set_args( ['Name' => 'Min Max Quantity & Step Control for WooCommerce'] )
        ->set_download_link('https://wordpress.org/plugins/woo-min-max-quantity-step-control-single/')
        ->set_this_download_link('https://wordpress.org/plugins/wc-quantity-plus-minus-button');
        $mmp_message = __('If you want to set CONDITION for minimum and maximum limit and want to control step, then you can install it. Otherwise ignore it.','wqpmb');
        $req_mmp->set_message($mmp_message);
        $req_mmp->get_full_this_plugin_name($this_plugin);
        // var_dump(method_exists($req_mmp, 'set_location'),$req_mmp);
        // ->set_required();
        if( method_exists($req_mmp, 'set_location') ){

            if($randN == 2){
                $req_mmp->set_location('wqpmb_plugin_recommend_top');
                $req_mmp->run();
            }

            $req_mmp->set_location('wqpmb_plugin_recommend_here');
            $req_mmp->run();
        }


        $qv_req_slug = 'ca-quick-view/init.php';
        $qv_tar_slug = self::$base_file;
        $req_qv = new Require_Control($qv_req_slug,$qv_tar_slug);
        $req_qv->set_args( ['Name' => 'Quick View vy CodeAstrology'] )
        ->set_download_link('https://wordpress.org/plugins/ca-quick-view/')
        ->set_this_download_link('https://wordpress.org/plugins/wc-quantity-plus-minus-button');
        $qv_message = __("Quick View by Code Astrology is a lightweight WooCommerce based plugin. A user can easily view a product without redirection.",'wqpmb');
        $req_qv->set_message($qv_message);
        $req_qv->get_full_this_plugin_name($this_plugin);
        if( method_exists($req_qv, 'set_location') ){
            $req_qv->set_location('wqpmb_plugin_recommend_here'); 
            $req_qv->run();
        }
        

        $pmb_req_slug = 'ultraaddons-elementor-lite/init.php';
        $pmb_tar_slug = self::$base_file;
        $req_pmb = new Require_Control($pmb_req_slug,$pmb_tar_slug);
        $req_pmb->set_args( ['Name' => 'UltraAddons - Elementor Addons'] )
        ->set_download_link('https://wordpress.org/plugins/ultraaddons-elementor-lite/')
        ->set_this_download_link('https://wordpress.org/plugins/woo-product-table/');
        $pmb_message = __('There are many WooCommerce Widget available at UltraAddons. You can Try it. Just Recommended','wqpmb');
        $req_pmb->set_message($pmb_message);
        $req_pmb->get_full_this_plugin_name($this_plugin);
        // ->set_required();
        if( method_exists($req_pmb, 'set_location') && did_action( 'elementor/loaded' ) ){

            $req_pmb->set_location('wqpmb_plugin_recommend_here'); //wpt_premium_image_bottom
            $req_pmb->run();
        }


    }
}