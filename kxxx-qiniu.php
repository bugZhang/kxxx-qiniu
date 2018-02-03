<?php
/*
Plugin Name: kxxx-qiniu
Plugin URI: https://github.com/bugZhang/kxxx-qiniu
Description: 七牛CDN插件
Version: 1.0
Author: Jerry Zhang
Author URI: https://github.com/bugZhang
*/
?>
<?php
require_once 'admin-options.php';
require_once 'kxxx-utils.php';

add_action('wp_loaded', 'kxxx_qiniu_start');

function kxxx_qiniu_start(){
    $utils  = new \Kxxx\Admin\KxxxUtils();
    add_filter('the_content', array($utils, 'kxxx_get_cdn_content'), 10);

//    add_action('save_post', array($utils, 'kxxx_save_post_action'), 10, 2);

    add_filter('wp_insert_post_data', array($utils, 'kxxx_save_post_action'), 10, 2);

}


