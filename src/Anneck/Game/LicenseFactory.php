<?php
/**
 * This file is part of the 4373Alpha-Server.
 *
 * User: andre
 * Date: 2/3/15
 * Time: 3:07 PM
 */

namespace Anneck\Game;

/**
 * The (Game) LicenseFactory is a factory interface and still WiP.
 */
interface LicenseFactory
{
    /**
     * @return License a new license
     */
    public function createLicence();
}
