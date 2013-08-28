<?php
/**
 * Created by WIKDOS.
 * @author: Marcelo Agüero <marcelogaguero@hotmail.com>
 * @since: 27/08/13 09:51
 *
 */
namespace src;

require_once(__DIR__."/exceptions/XsdToClassException.php");
require_once(__DIR__."/Constants.php");

use src\exceptions\XsdToClassException;
use src\Constants;

class XsdToClass
{
    /** @var \SimpleXMLElement $xsd */
    protected $xsd;
    protected $folder;

    function __construct($xsd){
        if (file_exists($xsd)) {
            $this->folder = dirname(realpath($xsd));
            $xml = simplexml_load_file($xsd);
            $this->xsd = $xml;
        } else {
            throw new XsdToClassException("There'nt is file ".$xsd);
        }
    }

    public function createFileClass($className, $elements){
        foreach($elements as $element){
            switch ($element->nodeName) {
                case Constants::COMPLEX:
                    die(var_dump($element));
                break;
                default:
            }
        }
    }

    public function convertXsd(){
        try {
            $includes = $this->xsd->xpath('/xs:schema/xs:include');
            foreach($includes as $include){
                $file = $include->attributes()->schemaLocation;
                try {
                    $xsdToClass = new XsdToClass($this->folder.DIRECTORY_SEPARATOR.$file);
                    $require = $xsdToClass->convertXsd();
                    die(var_dump($require));
                } catch (\Exception $e){
                    throw new XsdToClassException($e->getMessage());
                }
            }

            $nodes = array();
            $elements = $this->xsd->xpath('//xs:schema/descendant::*');

            foreach($elements as $element){
                $obj = new \stdClass();
                $obj->nodeName = $element->getName();
                $obj->name = (string) $element->attributes()->name;
                $obj->type = (string) $element->attributes()->type;
                $obj->xml = $element;
                $nodes[] = $obj;
            }

            $this->createFileClass($this->xsd->getName(), $nodes);


        } catch(\Exception $e){
            throw new XsdToClassException($e->getMessage());
        }
    }

    public function getXsd(){
        return $this->xsd->asXML();
    }
}
