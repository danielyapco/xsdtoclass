<?php
/**
 * Created by WIKDOS.
 * @author: Marcelo Agüero <marcelogaguero@hotmail.com>
 * @since: 27/08/13 09:51
 *
 */
namespace src\factory;

require_once('ParseFactory.php');
require_once('ParseInterface.php');
require_once('ParseAbstract.php');

use src\factory\ParseInterface;
use src\factory\ParseAbstract;
use src\factory\ClassCreator;

class ComplexTypeClass extends ParseAbstract implements ParseInterface
{
    public function parse()
    {
        $creator = new ClassCreator();
        $class = (string) $this->node->attributes()->name;

        $attributes = array();
        $elements = $this->node->xpath('descendant::*');
        foreach($elements as $element){
            switch($element->getName()){
                case \src\Constants::SEQUENCE:
                    $obj = new \stdClass();
                    $obj->name = (string) $element->attributes()->getName();
                    $obj->value = "array()";
                    $attributes[] = $obj;
                break;
            }
        }
        $creator->create($this->folder, $class, $attributes);
        die(var_dump("aca"));

    }
}
