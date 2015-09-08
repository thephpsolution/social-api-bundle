<?php
/**
 * Created by PhpStorm.
 * User: jmac
 * Date: 9/5/2015
 * Time: 11:48 AM
 */

namespace ThePhpSolution\SocialApiBundle\Api\Enum;


class ThirdPartyEnum
{
    const TWITTER = 'Twitter';
    protected $value;

    /**
     * ThirdPartyEnum constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    function __toString()
    {
        return $this->value;
    }


}