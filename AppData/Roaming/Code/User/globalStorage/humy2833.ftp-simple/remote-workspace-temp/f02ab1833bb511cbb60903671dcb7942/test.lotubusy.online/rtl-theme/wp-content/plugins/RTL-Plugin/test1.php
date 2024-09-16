<?php


    function adding_menu(){
        add_menu_page(
             'افزودن منوی تستی',
              'منوی تستی', 
              'manage_options', 
              'create_menu_test',
              'cr_menu_page',
            );

         add_submenu_page( 
            'create_menu_test', 
            'زیر منوی تستی', 
            'افزودن زیر منوی تستی', 
            'manage_options', 
            'add_sub_menu_page', 
            'adding_sub_menu', 
         );  
         function adding_sub_menu(){
            include 'test2.php';

               if(isset($_POST['save_btn'])){
                  if($_SERVER['REQUEST_METHOD'] == 'POST'){
                     $duc = [];
                        foreach($_POST as $keys => $value){
                           if($keys !='save_btn'){
                           $duc [$keys] = $value;
                        }
                     }
                        if(get_option( 'ls_add_test')){ 
                           update_option('ls_add_test', $duc);
                        }else{
                           add_option('ls_add_test', $duc);

                        } 
                  } 
               } 
         }

      }
                    
    add_action('admin_menu' , 'adding_menu'); 