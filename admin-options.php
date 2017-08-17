<?php
namespace Kxxx\Admin;

class KxxxAdminOptions{


    public $option_group = 'kxxx_qiniu_option';
    public $basic_section = 'kxxx_basic_section';

    public function __construct()
    {
        add_action('admin_init', array($this, 'kxxx_setting_init'));
        add_action('admin_menu', array($this, 'kxxx_create_menu'));     //侧边栏设置 注册顶级菜单
    }


    public function kxxx_setting_init(){

        //注册设置组页面
        register_setting($this->option_group, $this->option_group);
        //在页面中添加配置section
        add_settings_section($this->basic_section, 'Qiniu 基础设置', '', $this->option_group);

        $this->kxxx_add_basic_fields();

    }

    /**
     * 添加顶级菜单
     */
    public function kxxx_create_menu(){
        add_menu_page('kxxx_page_title', '七牛CDN', 'manage_options', $this->option_group, array($this, 'kxxx_options_page_html'));
    }

    public function kxxx_add_basic_fields(){

        $options = get_option($this->option_group);
        $basic_fields = array(
            'host'		=> array('title'=>'七牛域名',			'type'=>'url',		'description'=>'设置为七牛提供的测试域名或者在七牛绑定的域名。<strong>注意要域名前面要加上 http://</strong>。<br />如果博客安装的是在子目录下，比如 http://www.xxx.com/blog，这里也需要带上子目录 /blog '),
            'bucket'	=> array('title'=>'七牛空间名',		'type'=>'text',		'description'=>'设置为你在七牛提供的空间名。'),
            'access'	=> array('title'=>'ACCESS KEY',		'type'=>'text',		'description'=>''),
            'secret'	=> array('title'=>'SECRET KEY',		'type'=>'text',		'description'=>''),
        );

        foreach ($basic_fields as $key => $field){

            $label = '<label for="' . $key . '">' . $field['title'] . '</label>';
            $field['key'] = $key;
            $field['name'] = $this->option_group . '[' . $key . ']';
            $field['class'] = 'regular-text';
            $field['value'] = $options[$key];
            add_settings_field($key, $label, array($this, 'kxxx_field_input_cb'), $this->option_group, $this->basic_section, $field);

        }

    }

    public function kxxx_field_input_cb($arg){

        $value = $arg['value'] ? $arg['value'] : '';
        echo '<input id="' . $arg['key'] . '" value="' . $value . '" name="' . $arg['name'] . '"  class="' . $arg['class'] . '">';
        echo '<p class="description">' . $arg['description'] . '</p>';
    }

    public function kxxx_options_page_html(){

        //检查权限
        if(!current_user_can('manage_options')){
            return ;
        }

        if(isset($_GET['settings-updated'])){
            add_settings_error('kxxx_messages', 'kxxx-message', '保存成功', 'updated');
        }
//        else{
//            add_settings_error('kxxx_messages', 'kxxx-message', '保存失败', 'error');
//        }

        settings_errors('kxxx_messages');

        echo '<div class="warp">';

        echo '<form action="options.php" method="post">';

        settings_fields($this->option_group);

        do_settings_sections($this->option_group);

        submit_button('保存');

        echo '</form>';
        echo '</div>';

    }



}

if(is_admin()){
    $option = new KxxxAdminOptions();
}







