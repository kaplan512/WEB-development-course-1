<?php
class AddToDb extends Validator {
    private $table_name;
    function __construct(){
        parent::__construct();
        $this->table_name = 'registration_' . $this->date;
    }
    function add_to_db () {
        $connect = mysqli_connect('127.0.0.1:3306', 'root', '') or die('Connection error');

        $create_db = mysqli_query($connect, "CREATE DATABASE IF NOT EXISTS kultprosvet");

        $connect_db = mysqli_select_db($connect, "kultprosvet");

        $table = "CREATE TABLE $this->table_name (
			id INT(10) NOT NULL AUTO_INCREMENT, 
			name VARCHAR(100) NOT NULL DEFAULT '',
			s_name VARCHAR(100) NOT NULL DEFAULT '',
			email VARCHAR(100) NOT NULL DEFAULT '',
			ticket VARCHAR(100),
			PRIMARY KEY (id)
		)";

        $result = mysqli_query($connect, "SELECT email FROM $this->table_name");

        if($result) {
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                if($row['email'] == $this->email){
                    die('такой email существует');
                };
            }
        }


        $query_table = mysqli_query($connect,$table);

        $query = mysqli_query($connect,"insert into $this->table_name(name, s_name, email, ticket) values ('$this->name', '$this->s_name', '$this->email','$this->ticket')");
        

        if(mysqli_errno($connect) > 0){
            echo mysqli_errno($connect). ": " . mysqli_error($connect);
        }

        mysqli_close($connect);
    }
}