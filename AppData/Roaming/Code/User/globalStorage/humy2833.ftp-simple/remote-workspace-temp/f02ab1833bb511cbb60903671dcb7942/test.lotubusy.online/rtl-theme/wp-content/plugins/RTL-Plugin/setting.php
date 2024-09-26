<?php


    function add_setting(){
        $args = array(
			'type' => 'string', 
			'sanitize_callback' => 'sanitize_text_field',
			'default' => NULL,
			);  
            register_setting( 'general', '_ls_apikey', $args ); 
            register_setting( 'general', '_ls_password' , $args);

            add_settings_section( 
                '_ls_setting_section',
                'تنظیمات افزونه لاگین شو',
              'add_setting_holder',
               'general', 
        );
        function add_setting_holder(){
            echo "لطفا API Key خود را وارد نمایید.";
        }

            add_settings_field( 
            '_ls_setting_field',
             'API Key',
              'add_setting_field_holder',
               'general',
               '_ls_setting_section',
             );
             add_settings_field( 
                '_ls_password_field',
                 'پسورد سامانه را وارد نمایید',
                  'add_password_field_holder',
                   'general',
                   '_ls_setting_section',
                 );

        function add_setting_field_holder (){ 
         
            $setting = get_option( '_ls_apikey');
            ?>
        
                <input type="text" name="_ls_apikey" value="<?php echo isset($setting) ? esc_attr( $setting ) : '' ?>">
               <?php
        }
        function add_password_field_holder(){
            $setting = get_option( '_ls_password');
            ?>
        
                <input type="text" name="_ls_password" value="<?php echo isset($setting) ? esc_attr( $setting ) : '' ?>">
               <?php
        }
        }
    
    add_action('admin_init' , 'add_setting'); 