<?php
/**
 * Created by PhpStorm.
 * User: jmac
 * Date: 9/5/2015
 * Time: 12:12 PM
 */

namespace ThePhpSolution\SocialApiBundle\Integration\ThirdParties\Twitter;


use ThePhpSolution\SocialApiBundle\Api\User\User;
use ThePhpSolution\SocialApiBundle\Integration\Bridge;

class TwitterBridge extends Bridge
{
    /**
     * @var TwitterApi
     */
    protected $api;

    /**
     * TwitterBridge constructor.
     * @param TwitterApi $api
     */
    public function __construct(TwitterApi $api)
    {
        $this->api = $api;
    }

    /**
     * @return TwitterApi
     */
    protected function api()
    {
        return $this->api;
    }

    /**
     * @inheritDoc
     */
    public function overwriteUserData(User $user, $handle)
    {
        $this->api()->test();
        die(__FILE__.'twitter');
    }

    public function loadUser($handle)
    {

    }

}