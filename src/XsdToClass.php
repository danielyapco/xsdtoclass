<?php
/**
 * Created by WIKDOS.
 * @author: Marcelo Agüero <marcelogaguero@hotmail.com>
 * @since: 27/08/13 09:51
 *
 */
namespace src;

use src\exceptions\XsdToClassException;

require_once(__DIR__."/exceptions/XsdToClassException.php");

class XsdToClass
{
    /** @var \SimpleXMLElement $xsd */
    protected $xsd;

    function __construct($xsd){
        if (file_exists($xsd)) {
            $xml = simplexml_load_file($xsd);
            $this->xsd = $xml;
        } else {
            throw new XsdToClassException("There'nt is file ".$xsd);
        }
    }

    public function createFileClass($className){

    }

    public function convertXsd(){
        try {
            $includes = $this->xsd->xpath('/xs:schema/xs:include');

            foreach($includes as $include){
                $file = $include->attributes()->schemaLocation;
                $xsdToClass = new XsdToClass($file);
                // $require = $xsdToClass->convertXsd();
            }

            $elements = $this->xsd->xpath('/xs:schema/xs:element');
            foreach($elements as $element){
                $this->createFileClass($className);
            }

            die(var_dump($elements));

        } catch(\Exception $e){
            throw new XsdToClassException($e->getMessage());
        }
    }

    public function getXsd(){
        return $this->xsd->asXML();
    }
}
