<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 17.02.15, 11:20 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Configuration;

/**
 * The class DefaultResourceConfiguration is used during dev and for testing purposes.
 */
class DefaultResourceConfiguration extends ConfigurationRoot
{
    /**
     * the key to retrieve the value of the resource type.
     */
    const TYPE = 'RESOURCE_TYPE';

    public function __construct()
    {
        parent::__construct();
        $this->setConfiguration(self::NAME, 'defaultResourceName');
        $this->setConfiguration(self::TYPE, 'defaultResourceType');
    }
}
