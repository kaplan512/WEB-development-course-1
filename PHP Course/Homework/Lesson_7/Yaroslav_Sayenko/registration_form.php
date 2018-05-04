<?php

spl_autoload_register(function ($class) {
    include $class . '.php';
});

$addData = new Config();
$addData->save_way('xml');

$validate = new Validator();
$validate->validateData();


?>