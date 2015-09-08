<?php
/**
 * Created by PhpStorm.
 * User: jmac
 * Date: 9/5/2015
 * Time: 7:26 PM
 */

namespace ThePhpSolution\SocialApiBundle\Integration\ThirdParties\Twitter;


use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterApi
{
    /**
     * @var TwitterOAuth
     */
    private $service;

    /**
     * @var TwitterConfig
     */
    private $config;

    /**
     * TwitterApi constructor.
     * @param TwitterConfig $config
     */
    public function __construct(TwitterConfig $config)
    {
        $this->config = $config;
    }

    /**
     * @param TwitterOAuth $service
     * @return $this
     */
    public function setService(TwitterOAuth $service)
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @return TwitterOAuth
     */
    protected function service()
    {
        return $this->service ?: new TwitterOAuth(
            $this->config->getConsumerKey(),
            $this->config->getConsumerSecret(),
            $this->config->getAccessToken(),
            $this->config->getAccessTokenSecret()
        );
    }

    public function test()
    {
        header('Content-Type: text/plain');
//        print_r($this->service()->get('account/verify_credentials'));
        $token = $this->service()->oauth('oauth/request_token');
        print_r($token);
        exit;
    }
}