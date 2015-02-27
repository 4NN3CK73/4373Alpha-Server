<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 27.02.15, 11:16 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Meta\Action;

/**
 * The class ActionTypes currently just holds CONST values
 * used by Action classes to identify by type.
 */
class ActionTypes
{
    const ITEM = 'ActionType::ITEM';
    const USER = 'ActionType::USER';
    const SYSTEM = 'ActionType::SYS';
}
