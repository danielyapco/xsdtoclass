<?php
    require_once ("../src/XsdToClass.php");
    try {
        $parser = new \src\XsdToClass("WSP.xsd");
        die(var_dump($parser->convertXsd()));
    } catch (\src\exceptions\XsdToClassException $e){
        die(var_dump($e->getMessage()));
    }
?>