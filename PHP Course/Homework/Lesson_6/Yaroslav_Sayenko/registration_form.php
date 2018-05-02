<?php

date_default_timezone_set('UTC');

$name = htmlspecialchars($_POST['name']);
$s_name = htmlspecialchars($_POST['s_name']);
$email = htmlspecialchars($_POST["email"]);
$ticket = htmlspecialchars($_POST['ticket']);

$date = date('d_m_Y');

$valid_email = filter_var($email, FILTER_VALIDATE_EMAIL);

$table_name = 'registration_' . $date;

if(!$valid_email) {
    die ("Введите коректный email");
}

if((strlen($name) <= 1) || (!$s_name) || (!$email) || (!$ticket)){
    die ("Все поля должны быть заполнены");
}

$connect = mysqli_connect('127.0.0.1:3306', 'root', '') or die('Connection error');

$create_db = mysqli_query($connect, "CREATE DATABASE IF NOT EXISTS kultprosvet");

$connect_db = mysqli_select_db($connect, "kultprosvet");

$table = "CREATE TABLE $table_name (
			id INT(10) NOT NULL AUTO_INCREMENT, 
			name VARCHAR(100) NOT NULL DEFAULT '',
			s_name VARCHAR(100) NOT NULL DEFAULT '',
			email VARCHAR(100) NOT NULL DEFAULT '',
			ticket VARCHAR(100),
			PRIMARY KEY (id)
		)";

$result = mysqli_query($connect, "SELECT email FROM $table_name");

if($result) {
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        if($row['email'] == $email){
            die('такой email существует');
        };
    }
}


$query_table = mysqli_query($connect,$table);

$query = mysqli_query($connect,"insert into $table_name(name, s_name, email, ticket) values ('$name', '$s_name', '$email','$ticket')");

echo "Запись добавлена";

if(mysqli_errno($connect) > 0){
    echo mysqli_errno($connect). ": " . mysqli_error($connect);
}

mysqli_close($connect);

?>

