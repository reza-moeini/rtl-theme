
<?php 
     $ops = get_option( 'ls_add_test');
?>
<div>
    <form action="" method="POST">
            <input type="text" value="<?php echo $ops['test_title'] ?>" name="test_title" >
            <textarea name="text_area_title" id="" cols="30" rows="10"> <?php echo $ops['text_area_title'] ?> </textarea>
            <input type="submit" name="save_btn">
    </form>
  

</div> 
                              