<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 12.02.15
 * Time: 17:21
 */

namespace Anneck\Game\Continent;


use Doctrine\Common\Collections\ArrayCollection;

class ContinentConfigKeys {

    public static $continetKeys = array(
        'NAME',
        'DESC',
        'RSRC'
    );

    public static function getAllKeys()
    {
        return new ArrayCollection(ContinentConfigKeys::$continetKeys);
    }
}