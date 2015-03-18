<?php
 /************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 18.03.15, 09:46 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Exception;

/**
 * The GameFeatureMissingException is thrown when the game engine or an action is using a feature the game interface
 * does not provide!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
class GameFeatureMissingException extends GameException
{
}
