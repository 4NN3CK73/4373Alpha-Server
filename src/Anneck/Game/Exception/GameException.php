<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 13.02.15
 * Time: 08:52
 */

namespace Anneck\Game\Exception;

/**
 * Class GameException is the root Exception for all other exceptions to extend!
 *
 * @package Anneck\Game\Exception
 */
class GameException extends \Exception
{

    /**
     * @param string $message
     * @param int $code
     */
    public function __construct($message, $code)
    {
        parent::__construct(
            $message,
            $code
        );
    }

}