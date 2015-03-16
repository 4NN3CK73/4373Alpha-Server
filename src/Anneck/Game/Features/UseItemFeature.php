<?php
/************************************************************************
 * This file is part of 4373Alpha-Server Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * ************************************************************************
 * Created at 16.03.15, 09:03 by 4nn3ck
 * ************************************************************************
 */

namespace Anneck\Game\Features;

use Anneck\Game\ItemInterface;

/**
 * The UseItemFeature.
 *
 * @todo    Write PHPDoc for this class!
 *
 * @since   0.0.1-dev
 *
 * @author  André Anneck <andreanneck73@gmail.com>
 */
interface UseItemFeature
{
    /**
     * @param ItemInterface $item
     * @param               $actionName
     *
     * @return mixed
     */
    public function useItem(ItemInterface $item, $actionName);
}
