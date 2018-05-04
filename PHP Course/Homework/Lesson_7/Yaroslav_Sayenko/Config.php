<?php
class Config
{
    function save_way($chooseWay) {
        if ($chooseWay == 'txt') {
            $addTxt = new AddTxt();
            $addTxt->addLine();
        }
        if($chooseWay == 'db') {
            $addToDb = new AddToDb();
            $addToDb->add_to_db();
        }
        if($chooseWay == 'xml'){
            $addXML = new AddXML();
            $addXML->add_xml();
        }
    }
}