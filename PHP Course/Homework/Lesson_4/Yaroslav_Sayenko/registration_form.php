<?php

date_default_timezone_set('UTC');

$name = htmlspecialchars($_POST['name']);
$s_name = htmlspecialchars($_POST['s_name']);
$email = htmlspecialchars($_POST['email']);
$ticket = htmlspecialchars($_POST['ticket']);
$string = $name . " " . $s_name . " " . $email . " " . $ticket . PHP_EOL;

$date = date('d_m_Y');

$valid_email = filter_var($email, FILTER_VALIDATE_EMAIL);

$file = 'registration_' . $date . ".txt";

if(!$valid_email) {
    die ("Введите коректный email");
}

if((strlen($name) <= 1) || (!$s_name) || (!$email) || (!$ticket)){
    die ("Все поля должны быть заполнены");
}

if(file_exists($file)){
    $f = fopen($file, "a+") or die ("Error");

    if (($f) && filesize($file)) {
        $lines = explode("\n", fread($f, filesize($file)));

        foreach($lines as $line){
            $l = explode(" ", $line);
            $line_items[] = $l[2];
        }
        foreach ($line_items as $item) {
            if($item === $email) {
                die ("Такой email уже существует");
            }
        }
        fwrite($f, $string);
    }
    else {
        fwrite($f, $string);
    }

    fclose($f);
}
if(!file_exists($file)) {
    $f = fopen($file, "a+") or die ("Error");

    fwrite($f, $string);

    fclose($f);
}
