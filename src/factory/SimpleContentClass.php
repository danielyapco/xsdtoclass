<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Marcelo <marcelogaguero@hotmail.com>
 * Date: 02/09/13
 * Time: 20:06
 * To change this template use File | Settings | File Templates.
 */
namespace src\factory;

require_once('ParseInterface.php');

use src\factory\ParseInterface;

class SimpleContentClass extends ParseAbstract implements ParseInterface
{
    public function parse()
    {
        // TODO: Implement parse() method.
    }
}
