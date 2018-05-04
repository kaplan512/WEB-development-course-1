<?php
class AddXML extends Validator {
    private $file;
    private $dom;
    function __construct(){
        parent::__construct();
        $this->file = 'registration_' . $this->date . ".xml";
        $this->dom = new DOMDocument('1.0', 'UTF-8');
    }
    function add_xml_row() {
        $root = $this->dom->documentElement;

        $userDOM = $this->dom->createElement("user");
        $nameDOM = $this->dom->createElement("name");
        $s_nameDOM = $this->dom->createElement("s_name");
        $emailDOM = $this->dom->createElement("email");
        $ticketDOM = $this->dom->createElement("ticket");

        $nameText = $this->dom->createTextNode($this->name);
        $s_nameText = $this->dom->createTextNode($this->s_name);
        $emailText = $this->dom->createTextNode($this->email);
        $ticketText = $this->dom->createTextNode($this->ticket);

        $nameDOM->appendChild($nameText);
        $userDOM->appendChild($nameDOM);
        $s_nameDOM->appendChild($s_nameText);
        $userDOM->appendChild($s_nameDOM);
        $emailDOM->appendChild($emailText);
        $userDOM->appendChild($emailDOM);
        $ticketDOM->appendChild($ticketText);
        $userDOM->appendChild($ticketDOM);
        $root->appendChild($userDOM);
        $this->dom->save($this->file);
    }
    function add_xml() {
        if(!file_exists($this->file)){
            $this->dom->appendChild($this->dom->createElement('users'));
            $this->add_xml_row();
        }
        else {
            $sxml = simplexml_load_file($this->file);
            foreach ($sxml->user as $val)
            {
                if($val->email == $this->email) {
                    die('такой email существует');
                }
            }

            $this->dom->load($this->file);
            $this->add_xml_row();
        }
    }
}