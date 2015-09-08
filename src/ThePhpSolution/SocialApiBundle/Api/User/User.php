<?php
/**
 * Created by PhpStorm.
 * User: jmac
 * Date: 9/5/2015
 * Time: 11:37 AM
 */
namespace ThePhpSolution\SocialApiBundle\Api\User;

/**
 * User to map data into/form.
 */
interface User
{
    /**
     * @param string $string
     * @return $this
     */
    public function setName($string);

    /**
     * @return null|string
     */
    public function getName();

    /**
     * @param string $string
     * @return $this
     */
    public function setEmail($string);

    /**
     * @return null|string
     */
    public function getEmail();
}