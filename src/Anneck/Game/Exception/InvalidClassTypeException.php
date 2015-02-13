<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 13.02.15
 * Time: 09:06
 */

namespace Anneck\Game\Exception;

/**
 * Class InvalidClassTypeException
 * @package Anneck\Game\Exception
 */
class InvalidClassTypeException extends GameException {

    public static $ERROR_MSG    = 'The type of class is not valid for this action!';
    public static $ERROR_CODE   = '0010';

}