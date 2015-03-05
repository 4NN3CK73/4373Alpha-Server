<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 04.03.15, 13:18 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Configuration;

use Symfony\Component\Config\Definition\ConfigurationInterface as SymfonyConfigurationInterface;

/**
 * The ConfigurationInterface simply extends SymfonyConfigurationInterface to enable transparent use of the default
 * symfony configuration component.
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
interface ConfigurationInterface extends SymfonyConfigurationInterface
{
    /**
     * Returns the string representation of this class.
     *
     * @return string the string representation of this class.
     */
    public function __toString();
}
