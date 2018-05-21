<?php
class Validator {
    public $name  = 'name ';
    public $s_name  = 's_name ';
    public $email = 'email ';
    public $ticket = 'ticket ';
    public $date;
    public $inputCode;
    public $sessionCap;
    public $inputCap;
    function __construct(){
        $this->name = $_POST['name'];
        $this->s_name = $_POST['s_name'];
        $this->email = $_POST['email'];
        $this->ticket = $_POST['ticket'];
        $this->inputCode = $_POST['captcha'];
        $this->date = date('d_m_Y');
        $this->sessionCap = $_SESSION['captcha'];
        $this->inputCap = $_POST['captcha'];
    }
    function validateData(){
        $valid_email = filter_var($this->email, FILTER_VALIDATE_EMAIL);


        if($this->sessionCap !== $this->inputCap) {
            echo "Введенный код " . $this->inputCap;
            echo "Код сессии " . $this->sessionCap;
            die ("Введите верный проверочный код");
        }

        if(!$valid_email) {
            die ("Введите коректный email");
        }

        if((strlen($this->name) <= 1) || (!$this->s_name) || (!$this->email) || (!$this->ticket)){
            die ("Все поля должны быть заполнены");
        }

        unset ( $_SESSION ['capthca'] );
    }
}
