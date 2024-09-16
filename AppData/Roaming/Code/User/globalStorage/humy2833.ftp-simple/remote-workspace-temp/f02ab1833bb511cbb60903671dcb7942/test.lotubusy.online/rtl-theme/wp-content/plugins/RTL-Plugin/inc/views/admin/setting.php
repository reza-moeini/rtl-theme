<?php
    $option= get_option('_ls_setting');

?>

<div style="width: 100px; padding: 30px;">
    <h2 style="width: 200px;">به تنظیمات لاگین شو خوش آمدید</h2>            
<form action="" method="POST">
                <label for="">عنوان فرم</label>
                <input type="text" value="<?php echo $option['form_title'] ?>" name="form_title" placeholder="متن خود را وارد کنید">
               <textarea name="textarea" id="" cols="30" rows="10"> <?php echo $option['textarea'] ?></textarea>
               <input type="submit" name="submit" value="ذخیره">
            </form>

</div>