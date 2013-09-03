<?php
/**
 * Created by WIKDOS.
 * @author: Marcelo Agüero <marcelogaguero@hotmail.com>
 * @since: 27/08/13 09:51
 *
 */
namespace src\factory;

require_once('ParseInterface.php');
require_once('ParseAbstract.php');

use src\factory\ParseInterface;
use src\factory\ParseAbstract;

class ComplexTypeClass extends ParseAbstract implements ParseInterface
{
    public function parse()
    {
        // TODO: Implement parse() method.
    }
}
