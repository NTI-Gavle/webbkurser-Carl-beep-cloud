<?php 

function checkimage($imagename,$imagelastname){
    $extensions2 = ['jpg', 'jpeg', 'png', 'gif'];
    $imagePath2 = '';
    foreach ($extensions2 as $ext2) {
        if (file_exists("bilder/{$imagename}{$imagelastname}.$ext2")) {
            $imagePath2 = "bilder/{$imagename}{$imagelastname}.$ext2";
            break;
        }
    }
    $imagePath2 = $imagePath2 ?: "bilder/no-user-image.png";

    return $imagePath2;
}

?>