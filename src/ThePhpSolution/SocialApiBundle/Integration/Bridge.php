<?php
/**
 * Created by PhpStorm.
 * User: jmac
 * Date: 9/5/2015
 * Time: 12:07 PM
 */

namespace ThePhpSolution\SocialApiBundle\Integration;


use ThePhpSolution\SocialApiBundle\Api\User\User;

abstract class Bridge
{
    /**
     * @param User $user
     * @param string $key
     * @return $this;
     */
    abstract public function overwriteUserData(User $user, $key);

}