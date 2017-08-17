<?php
namespace Kxxx\Admin;

class KxxxUtils{


    public function kxxx_convert_url_to_cdn($sourceStr, $cdnDomain){
        if(!$sourceStr){
            return '';
        }
        return str_replace(get_home_url(), $cdnDomain, $sourceStr);
    }

    public function kxxx_get_image_from_content($content){

        $cdn_content = preg_replace_callback('|<img.*?src=[\'"](.*?)[\'"].*?>|i',array($this, 'kxxx_images_handler'),$content);
        return  $cdn_content;
    }

    public function kxxx_images_handler($matches){

        $img_url 	= trim($matches[1]);

        if(empty($img_url)) return;

        $options    = get_option('kxxx_qiniu_option');
        return $this->kxxx_convert_url_to_cdn($matches[0], $options['host']);

    }

}