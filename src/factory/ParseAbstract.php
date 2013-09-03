<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Marcelo <marcelogaguero@hotmail.com>
 * Date: 02/09/13
 * Time: 20:17
 * To change this template use File | Settings | File Templates.
 */
namespace src\factory;

require_once ("ClassCreator.php");
require_once (__DIR__."/../Constants.php");

abstract class ParseAbstract
{
    protected $node;
    protected $folder;

    public function setNode(\SimpleXMLElement $node){
        $this->node = $node;
    }

    public function asXML(){
        return $this->node->asXML();
    }

    public function setFolder($folder){
        $this->folder = $folder;
    }
}
