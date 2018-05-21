<?php
function capture(){
    session_start();

    header ( "Cache-Control: no-cache" );

    header ( "Content-type: image/jpg" );

    $captcha_length = 6;
    $image = imagecreatetruecolor ( 200, 75 );
    $back_color = imagecolorallocate ( $image, 255, 255, 255 );
    $code = "";

    for($i = 0; $i < $captcha_length; $i ++) {

        $x_axis = 20 + ($i * 20);
        $y_axis = 50 + rand ( 0, 7 );

        $color1 = rand ( 001, 150 );
        $color2 = rand ( 001, 150 );
        $color3 = rand ( 001, 150 );
        $txt_color [$i] = imagecolorallocate ( $image, $color1, $color2, $color3 );

        $size = rand ( 20, 30 );

        $angle = rand ( -15, 15 );

        $sign = function ($len=1) {
            $s = "";
            $b="qwertyuopasdfghjkzxcvbnm123456789";
            while($len-->0)  {
                $s.=$b[mt_rand(0,strlen($b))];
            }
            return "$s";
        };
        $t = $sign();
        $code .= "$t";

        imagettftext ( $image, $size, $angle, $x_axis, $y_axis, $txt_color[$i], "C:\OSPanel\domains\kultprosvet\arial.ttf", $t);
    }


    imagejpeg ( $image);

    $_SESSION['captcha'] = $code;
}

capture();