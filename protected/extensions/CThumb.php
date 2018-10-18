<?php

class CThumb extends CApplicationComponent
{
    public static function createThumb($source, $target = '', $maxwidth = 0, $maxheight = 0)
    {
        if (empty($source)) {
            return false;
        }

        $pathinfo = pathinfo($source);
        $extension = $pathinfo['extension'];
        if (empty($target)) {
            $target = $pathinfo['dirname'] . DIRECTORY_SEPARATOR . $pathinfo['filename'] . '_thumb';
            if (!empty($maxwidth) || !empty($maxheight)) {
                $target .= '_' . $maxwidth . '_' . $maxheight;
            }
            $target .= '.' . $extension;
        }

        if (empty($maxwidth) && empty($maxheight)) {
            copy($source, $target);
            return $target;
        }

        switch (strtolower($extension)) {
            case 'gif':
                $im = imagecreatefromgif($source);
                break;
            case 'jpg':
            case 'jpeg':
                $im = imagecreatefromjpeg($source);
                break;
            case 'png':
                $im = imagecreatefrompng($source);
                imagesavealpha($im,true);
                break;
            default:
                copy($source, $target);
                return $target;
        }

        self::resizeImage($im, $maxwidth, $maxheight, $target, $extension);
    }

    public static function resizeImage($im, $maxwidth, $maxheight, $name, $filetype)
    {
        $pic_width = imagesx($im);
        $pic_height = imagesy($im);

        if (($maxwidth && $pic_width > $maxwidth) || ($maxheight && $pic_height > $maxheight)) {
            $resizewidth_tag = false;
            $resizeheight_tag = false;
            if ($maxwidth && $pic_width > $maxwidth) {
                $widthratio = $maxwidth / $pic_width;
                $resizewidth_tag = true;
            }

            if ($maxheight && $pic_height > $maxheight) {
                $heightratio = $maxheight / $pic_height;
                $resizeheight_tag = true;
            }

            if ($resizewidth_tag && $resizeheight_tag) {
                if ($widthratio < $heightratio)
                    $ratio = $widthratio;
                else
                    $ratio = $heightratio;
            }

            if ($resizewidth_tag && !$resizeheight_tag)
                $ratio = $widthratio;
            if ($resizeheight_tag && !$resizewidth_tag)
                $ratio = $heightratio;

            $newwidth = $pic_width * $ratio;
            $newheight = $pic_height * $ratio;

            if (function_exists("imagecopyresampled")) {
                $newim = imagecreatetruecolor($newwidth, $newheight);
                imagealphablending($newim, false);
                imagesavealpha($newim,true);
                imagecopyresampled($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $pic_width, $pic_height);
            } else {
                $newim = imagecreate($newwidth, $newheight);
                imagecopyresized($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $pic_width, $pic_height);
            }

            switch (strtolower($filetype)) {
                case 'gif':
                    imagegif ( $newim, $name );
                    break;
                case 'png':
                    imagepng ( $newim, $name );
                    break;
                default:
                    imagejpeg ( $newim, $name );
                    break;
            }
            imagedestroy($newim);
        } else {
            switch (strtolower($filetype)) {
                case 'gif':
                    imagegif ( $im, $name );
                    break;
                case 'png':
                    imagepng ( $im, $name );
                    break;
                default:
                    imagejpeg ( $im, $name );
                    break;
            }
            imagedestroy($im);
        }
    }
}

?>