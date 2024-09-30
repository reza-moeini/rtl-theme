<?php

    function add_custom_setting_menu(){
        add_options_page( 
            'تنظیمات لاگینی', 
            'تنظیمات لاگینی', 
             'manage_options',
              'custom_login', 
                'setting_holder'
        );
    }
        function setting_holder(){ 
if ( isset( $_GET['settings-updated'] ) ) {
            // add settings saved message with the class of "updated"
            add_settings_error( 'logins_messages', 'logins_message', __( 'فرم با موفقیت ذخیره شد' ), 'updated' );
            // show error/update messages
	settings_errors( 'logins_messages' );
        }
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        ?>
            <div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
    <?php
             settings_fields( 'logins' );
            do_settings_sections('logins');
            submit_button( 'ذخیره');
        }

        

        function ls_register(){
            register_setting( 'logins', 'ls_apikeys' );
            register_setting( 'logins', 'ls_passkeys' );

            add_settings_section( 
                '_ls_setting_sections',
                 'تنظیمات پیام رسان', 
                 'ls_setting_holders',
                  'logins',
            );
            add_settings_field( 
                'ls_setting_field', 
                'تنظیمات',
                'ls_field_holders',
                  'logins',
                  '_ls_setting_sections',
            );
            add_settings_field( 
                'ls_password_field', 
                'تنظیمات رمز پیام رسان',
                'ls_password_holders',
                  'logins',
                  '_ls_setting_sections',
            );
        }
        function ls_setting_holders(){
            echo "this is sections";
        }
        function ls_field_holders(){
            $settings = get_option('ls_apikeys');
    ?>
    <input type="text" name="ls_apikeys" value="<?php echo isset($settings) ? esc_attr($settings) : ''; ?>">
    <?php
        }
        function ls_password_holders(){
            $settings = get_option('ls_passkeys');
            ?>
            <input type="text" name="ls_passkeys" value="<?php echo isset($settings) ? esc_attr($settings) : ''; ?>">
            <?php
        }
   

    add_action( 'admin_menu', 'add_custom_setting_menu');
    add_action( 'admin_init', 'ls_register' );