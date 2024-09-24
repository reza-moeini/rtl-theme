<?php


function add_dashboard_widget(){
    wp_add_dashboard_widget( 
        'dsh_widget',
         'ویجت اختصاصی من', 
         'ls_dash_wdg'
        );
}
function ls_dash_wdg(){
    $users = count_users();
    $posts = wp_count_posts();
     ?>
   
    <p>تعداد کل کاربران <?php echo "$users[total_users]" ?></p> 
    <p>تعداد کل پست های منتشر شده <?php echo "$posts->publish"?></p> 

    <?php
}


    add_action( 'wp_dashboard_setup', 'add_dashboard_widget' );  
