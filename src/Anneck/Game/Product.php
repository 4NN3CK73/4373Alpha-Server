<?php
/**
 * This file is part of the 4373Alpha-Server
 *
 * User: andre
 * Date: 2/3/15
 * Time: 12:32 PM
 */

namespace Anneck\Game;

/**
 * The interface Product
 * @package Anneck\Game
 */
interface Product {

    public function addResource(Resource $resource);

    public function addLicence(License $license);

    public function build();

    public function validate();

}