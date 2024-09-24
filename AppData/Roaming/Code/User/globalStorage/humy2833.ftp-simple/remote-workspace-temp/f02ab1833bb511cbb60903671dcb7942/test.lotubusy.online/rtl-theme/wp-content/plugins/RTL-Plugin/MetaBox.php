<?php
function add_register_video_metabox() {
    add_meta_box(
        'ls_video_url',
        'آدرس ویدئو',
        'ls_video_url_meta_box',
        'post', // یا نوع پست سفارشی خود را اینجا وارد کنید
        'normal' // یا 'side'، 'advanced' بر اساس نیاز شما
    );
}

function add_download_url_metabox() {
    add_meta_box(
        'ls_download_meta_box',
        'باکس دانلود',
        'ls_download_url_meta_box',
        'post', // یا نوع پست سفارشی خود را اینجا وارد کنید
        'normal' // یا 'side'، 'advanced' بر اساس نیاز شما
    );
}


function ls_video_url_meta_box($post) { ?>
<?php
wp_nonce_field( 'video_url_nonce', 'video_url_field' )
?>
        <label for="video_url">آدرس ویدئو</label>
            <input type="text" value="<?php echo get_post_meta( $post->ID, 'ls_video_url', true ); ?>" name="video_url" id="" placeholder="ادرس خود را وارد کنید" style="width: 100%;">

    <?php
    }
function ls_download_url_meta_box($post){ ?>
    <label for="video_url">عنوان لینک</label>
    <input type="text" value="<?php echo get_post_meta( $post->ID, 'ls_title_url', true ); ?>" name="title_url" id="" placeholder="عنوان لینک خود را وارد کنید" style="width: 100%;">
    <label for="video_url">لینک دانلود</label>
    <input type="text" value="<?php echo get_post_meta( $post->ID, 'ls_download_url', true ); ?>" name="download_url" id="" placeholder="ادرس لینک خود را وارد کنید" style="width: 100%;">
<?php
}
  
    function save_url_metabox($post_id){
    //     if(get_post_meta( $post_id, 'ls_video_url', true )){
    //         update_post_meta( $post_id, 'ls_video_url', $_POST['video_url'] );

    //     }else{
    //         add_post_meta( $post_id, 'ls_video_url', $_POST['video_url'] );

    //     }
    $video_url =    sanitize_text_field( $_POST['video_url'] );
    $title_url =    sanitize_text_field( $_POST['title_url'] );
    $download_url =    sanitize_text_field( $_POST['download_url'] );

    if ( !empty($_POST['video_url']) && !empty($_POST['title_url']) && !empty($_POST['download_url']) ) {
        update_post_meta( $post_id, 'ls_video_url', $_POST['video_url'] );
        update_post_meta( $post_id, 'ls_title_url', $_POST['title_url'] );
        update_post_meta( $post_id, 'ls_download_url', $_POST['download_url'] );
    }
}


add_action( 'save_post', 'save_url_metabox' );
add_action('add_meta_boxes', 'add_register_video_metabox');
add_action('add_meta_boxes', 'add_download_url_metabox');

 
?>