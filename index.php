<?php
require 'checkfunction.php';
if(isset($_FILES['image']))
{
    $file_name=$_FILES['image']['name'];
    $file_tmp=$_FILES['image']['tmp_name'];
    if(allowed_image($file_name)==TRUE)
    {
        $file_name=  md5(microtime(true)).'png';
        watermark_image($file_tmp,'uploads/'.$file_name);
         echo '<p><a href="images/uploads/'.$file_name.'">Click to see watermarked image</a></p>';
    }
    else
    {
        echo"<h2><b>Not an image, or image Type Not Accepted.</b></h2>";
    }
}
?>

<!doctype html>
<html>
    <head>
        <title>WaterMark Image Uploads</title>
    </head>
    <body>
        <form method="post" enctype="multipart/form-data">
           Choose File: <input type='file' name='image' multiple >
            <input type='submit' value="upload">
        </form>
    </body>
</html>