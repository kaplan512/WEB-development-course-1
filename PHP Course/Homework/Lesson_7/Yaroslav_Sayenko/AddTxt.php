<?php
class AddTxt extends Validator {
    private $string;
    private $file;
    function __construct(){
        parent::__construct();
        $this->file = 'registration_' . $this->date . ".txt";
        $this->string = $this->name . " " . $this->s_name . " " . $this->email . " " . $this->ticket . PHP_EOL;
    }
    function addLine(){
        if(file_exists($this->file)){
            $f = fopen($this->file, "a+") or die ("Error");

            if (($f) && filesize($this->file)) {
                $lines = explode("\n", fread($f, filesize($this->file)));

                foreach($lines as $line){
                    $l = explode(" ", $line);
                    $line_items[] = $l[2];
                }
                foreach ($line_items as $item) {
                    if($item === $this->email) {
                        die ("Такой email уже существует");
                    }
                }
                fwrite($f, $this->string);
            }
            else {
                fwrite($f, $this->string);
            }

            fclose($f);
        }
        if(!file_exists($this->file)) {
            $f = fopen($this->file, "a+") or die ("Error");

            fwrite($f, $this->string);

            fclose($f);
        }
    }
}
