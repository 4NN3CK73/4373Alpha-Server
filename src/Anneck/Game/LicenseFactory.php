<?php
/**
 * This file is part of the 4373Alpha-Server
 *
 * User: andre
 * Date: 2/3/15
 * Time: 3:07 PM
 */

namespace Anneck\Game;

use Anneck\Game\License;

/**
 * The interface LicenseFactory
 * @package Anneck\Manufacture
 */
interface LicenseFactory {

    /**
     * @return License a new license
     */
    public function createLicence();

}