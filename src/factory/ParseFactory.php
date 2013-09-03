<?php
/**
 * Created by WIKDOS.
 * @author: Marcelo Agüero <marcelogaguero@hotmail.com>
 * @since: 27/08/13 09:51
 *
 */
namespace src\factory;

require_once(__DIR__."/../exceptions/XsdToClassException.php");

use src\exceptions\XsdToClassException;

class ParseFactory
{
    public static function factory(\SimpleXMLElement $node){
        $class = ucfirst($node->getName());
        if (include_once $class . 'Class.php') {
            $instance = null;
            eval('$instance = new src\\factory\\'.$class.'Class();');
            $instance->setNode($node);
            return $instance;
        } else {
            throw new XsdToClassException('There is no parser class.');
        }
    }
}
