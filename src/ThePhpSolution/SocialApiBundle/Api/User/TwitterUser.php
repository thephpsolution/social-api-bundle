<?php
/**
 * Created by PhpStorm.
 * User: jmac
 * Date: 9/5/2015
 * Time: 11:38 AM
 */

namespace ThePhpSolution\SocialApiBundle\Api\User;


/**
 * Represents a Twitter user.
 *
 * This essentially decorates the User interface with Twitter-specific information.
 */
interface TwitterUser extends User
{
    /**
     * @return null|string
     */
    public function getHandle();
}