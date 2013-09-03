<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Marcelo <marcelogaguero@hotmail.com>
 * Date: 02/09/13
 * Time: 21:54
 * To change this template use File | Settings | File Templates.
 */
namespace src\factory;

class ClassCreator
{
    static public function create($folder, $class, $attributes){
        if(empty($class)) return false;

        $text = "<?php".PHP_EOL;
        $text .= "/**".PHP_EOL;
        $text .= "* ".$class." insert description". PHP_EOL;
        $text .= "* Created by xsdtoClass.".PHP_EOL;
        $text .= "* Date: ".date("Y/m/d").PHP_EOL;
        $text .= "* Time: ".date("H:i").PHP_EOL;
        $text .= "*/".PHP_EOL;
        $text .= " ".PHP_EOL;
        $text .= "class ".$class.PHP_EOL;
        $text .= "{".PHP_EOL;

        foreach($attributes as $attribute){

            $var = strtolower($attribute->name);

            if(empty($attribute->name)) continue;
            $text .= "\t /** @var ".$attribute->type." $".$var." */".PHP_EOL;
            $text .= "\t protected $".$var . " = " . $attribute->value.";".PHP_EOL;
            $text .= PHP_EOL;
            $text .= "\t/** Setter */". PHP_EOL;
            $text .= "\t public function set".ucfirst($attribute->name)."(".$attribute->type." $".$var." ) { ".PHP_EOL;
            $text .= "\t\t \$this->".$var." = $".$var.";". PHP_EOL;
            $text .= "\t }".PHP_EOL;

            $text .= PHP_EOL;
            $text .= "\t/** return ".$attribute->type." */". PHP_EOL;
            $text .= "\t public function get".ucfirst($attribute->name)."() { ".PHP_EOL;
            $text .= "\t\t return \$this->".$var.";". PHP_EOL;
            $text .= "\t }".PHP_EOL;
        }

        $text .= "}".PHP_EOL;
        $text .= "?>";

        $fp = fopen($folder.DIRECTORY_SEPARATOR.$class.".php", "wb");
        fwrite($fp, $text);
        fclose($fp);

        return true;
    }
}
