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

add_action('add_meta_boxes', 'add_register_video_metabox');

function ls_video_url_meta_box($post) { ?>
        <label for="video_url">آدرس ویدئو</label>
            <input type="text" value="<?php echo get_post_meta( $post->ID, 'ls_video_url', true ); ?>" name="video_url" id="video_url" placeholder="ادرس خود را وارد کنید" style="width: 100%;">

    <?php
    }

    function save_url_metabox($post_id){
        if(get_post_meta( $post_id, 'ls_video_url', true )){
            update_post_meta( $post_id, 'ls_video_url', $_POST['video_url'] );

        }else{
            add_post_meta( $post_id, 'ls_video_url', $_POST['video_url'] );

        }
    }


add_action( 'save_post', 'save_url_metabox' );

 
?>