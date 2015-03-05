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

interface ConfigurationInterface extends SymfonyConfigurationInterface {

    public function __toString();

}