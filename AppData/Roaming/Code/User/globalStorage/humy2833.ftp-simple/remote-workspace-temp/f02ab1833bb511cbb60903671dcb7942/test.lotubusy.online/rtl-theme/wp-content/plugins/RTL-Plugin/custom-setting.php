<?php
// تابع برای اضافه کردن صفحه تنظیمات به منوی ادمین
function ls_custom_page() {
    add_options_page(
        'تنظیمات افزونه لاگین شو',  // عنوان صفحه
        'تنظیمات افزونه لاگین شو',  // عنوان منو
        'manage_options',            // سطح دسترسی
        'ls_custom_page',            // اسلاگ (شناسه صفحه)
        'ls_custom_holder'           // تابع برای نمایش محتوای صفحه
    );
}

// تابع برای نمایش محتوای صفحه تنظیمات
function ls_custom_holder() {
    if ( isset( $_GET['settings-updated'] ) ) {
        // add settings saved message with the class of "updated"
        add_settings_error( 'loginsho_messages', 'loginsho_message', __( 'فرم با موفقیت ذخیره شد' ), 'updated' );
    }
    // show error/update messages
    settings_errors( 'loginsho_messages' );

    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    if ( isset( $_GET['tab'] ) ) {
        $active = $_GET['tab'];
    } else {
        $active = 'tab1';
    }
    ?>
    <div class="wrap">
        <div>
            <div class="nav-tab-wrapper">
                <a href="?page=ls_custom_page&tab=tab1" class="nav-tab  <?php echo $active == 'tab1' ? 'nav-tab-active' : '' ?>">تب اول</a> 
                <a href="?page=ls_custom_page&tab=tab2" class="nav-tab <?php echo $active == 'tab2' ? 'nav-tab-active' : '' ?>">تب دوم</a>
            </div>
        </div> 
        <h1>تنظیمات افزونه لاگین شو</h1>
        
        <?php
        if ( $active == 'tab1' ) { ?>
            <form action="options.php" method="post">
                <?php  
                settings_fields( 'loginsho1' );   // گروه تنظیمات
                do_settings_sections( 'loginsho' ); // نمایش بخش و فیلدها
                submit_button();
                ?>
            </form>
        <?php } else { ?>
            <form action="options.php" method="post">
                <?php  
                settings_fields( 'loginsho2' );   // گروه تنظیمات
                do_settings_sections( 'loginsho2' ); // نمایش بخش و فیلدها
                submit_button();
                ?>
            </form>
        <?php } ?>
    </div>
    <?php
}

// تابع برای اضافه کردن تنظیمات و فیلدهای تنظیمات
function add_custom_setting() {
    // ثبت تنظیمات
    register_setting( 'loginsho1', '_ls_custom' );
    register_setting( 'loginsho2', '_ls_custom2' );

    // اضافه کردن بخش تنظیمات برای تب اول
    add_settings_section(
        '_ls_custom_setting_section',  // شناسه بخش
        'تنظیمات افزونه لاگین شو',    // عنوان بخش
        'add_custom_setting_holder',   // تابع برای نمایش توضیحات بخش
        'loginsho'                     // صفحه تنظیمات
    );

    // اضافه کردن فیلد تنظیمات برای تب اول
    add_settings_field(
        '_ls_custom_setting_field',    // شناسه فیلد
        'Password',                    // عنوان فیلد
        'add_custom_setting_field_holder', // تابع برای نمایش فیلد
        'loginsho',                    // صفحه تنظیمات
        '_ls_custom_setting_section'   // بخش تنظیمات
    );

    // اضافه کردن بخش تنظیمات برای تب دوم
    add_settings_section(
        '_ls_custom_setting_section2',  // شناسه بخش
        '2تنظیمات افزونه لاگین شو',    // عنوان بخش
        'add_custom_setting_holder2',   // تابع برای نمایش توضیحات بخش
        'loginsho2'                     // صفحه تنظیمات
    );

    // اضافه کردن فیلد تنظیمات برای تب دوم
    add_settings_field(
        '_ls_custom_setting_field2',    // شناسه فیلد
        'Password',                    // عنوان فیلد
        'add_custom_setting_field_holder2', // تابع برای نمایش فیلد
        'loginsho2',                    // صفحه تنظیمات
        '_ls_custom_setting_section2'   // بخش تنظیمات
    );
}

// تابع برای نمایش توضیحات بخش تنظیمات
function add_custom_setting_holder() {
    echo 'Custom Holder for Tab 1';
}

// تابع برای نمایش فیلد تنظیمات برای تب اول
function add_custom_setting_field_holder() {
    $setting = get_option( '_ls_custom' );
    ?>
    <input type="text" name="_ls_custom" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
    <?php
}

// تابع برای نمایش توضیحات بخش تنظیمات برای تب دوم
function add_custom_setting_holder2() {
    echo 'Custom Holder for Tab 2';
}

// تابع برای نمایش فیلد تنظیمات برای تب دوم
function add_custom_setting_field_holder2() {
    $setting2 = get_option( '_ls_custom2' );
    ?>
    <input type="text" name="_ls_custom2" value="<?php echo isset( $setting2 ) ? esc_attr( $setting2 ) : ''; ?>">
    <?php
}

// اضافه کردن توابع به اکشن‌های وردپرس
add_action( 'admin_menu', 'ls_custom_page' );
add_action( 'admin_init', 'add_custom_setting' );