<?php
function allowed_image($file_name)
{
    $allowed_ext=array('jpg','jpeg','png','gif');
    $file_ext=  end(explode('.', $file_name));
     return in_array($file_ext, $allowed_ext)==TRUE ? TRUE : FALSE;
   
}
function watermark_image($file, $destination) {
    $watermark = imagecreatefrompng('image/watermark.png');
    
    $source = getimagesize($file);
    $source_mime = $source['mime'];

    if ($source_mime == 'png') {
        $image = imagecreatefrompng($file);
    } else
    if ($source_mime == 'jpeg') {
        $image = imagecreatefromjpeg($file);
    } else
    if ($source_mime == 'gif') {
        $image = imagecreatefromgif($file);
    }

    imagecopy($image, $watermark, 10, 10, 0, 0, imagesx($watermark), imagesy($watermark));
    imagepng($image,$destination);
}

?>