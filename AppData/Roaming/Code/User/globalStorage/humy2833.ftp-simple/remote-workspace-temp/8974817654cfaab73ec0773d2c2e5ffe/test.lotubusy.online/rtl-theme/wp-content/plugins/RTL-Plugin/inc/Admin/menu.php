<?php

add_action('admin_menu', 'ls_register_menu');

function ls_register_menu() {
    // منوی اصلی
    add_menu_page(
        'تنظیمات افزونه من',  // عنوان صفحه
        'تنظیمات افزونه من',  // عنوان منو
        'manage_options',      // سطح دسترسی (اصلاح شده)
        'ls_setting',          // نامک (Slug)
        'ls_setting_page',     // تابعی که صفحه را نمایش می‌دهد
        ''                     // آیکون منو (اختیاری)
    );

    // زیرمنو
    add_submenu_page(
        'ls_setting',          // slug صفحه والد (اصلاح شده)
        'تنظیمات',             // عنوان صفحه
        'تنظیمات',             // عنوان منو
        'manage_options',      // سطح دسترسی
        'ls_sub_page',         // slug صفحه زیرمنو
        'ls_sub_page'          // تابعی که صفحه را نمایش می‌دهد
    );
}

function ls_setting_page() {
    echo "Setting Page";
}

function ls_sub_page() {
    
    if(isset($_POST['submit'])){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){   

                $data = [];
                foreach ($_POST as $key => $item) {
                    # code... 
                    if ($key !='submit') {
                        $data [$key] = $item;      
                                }
                 
                }

        
            if(get_option( '_ls_setting')){
                update_option( '_ls_setting' , $data );
            }else{
                add_option( '_ls_setting', $data );
            }
              
            }
    }
            include LS_PLUGIN_INC . 'views/admin/setting.php';
    }




