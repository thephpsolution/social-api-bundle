<?php
/**
 * Created by PhpStorm.
 * User: jmac
 * Date: 9/5/2015
 * Time: 11:52 AM
 */

namespace ThePhpSolution\SocialApiBundle\Integration;


use Symfony\Component\DependencyInjection\Container;
use ThePhpSolution\SocialApiBundle\Api\Enum\ThirdPartyEnum;
use ThePhpSolution\SocialApiBundle\Api\Exceptions\UnsupportedThirdPartyKeyException;
use ThePhpSolution\SocialApiBundle\Api\ThirdParty;
use ThePhpSolution\SocialApiBundle\Integration\ThirdParties\Twitter\TwitterApi;
use ThePhpSolution\SocialApiBundle\Integration\ThirdParties\Twitter\TwitterBridge;

class ThirdPartyResolver
{
    /**
     * @var callable[]
     */
    protected $finders = [];

    /**
     * ThirdPartyResolver constructor.
     */
    public function __construct(Container $container)
    {
        $this->finders = [
            function($key) use ($container) {
                if ($key[0] === '@') {
                    $config = $container->get('social_api.twitter.config');
                    $api = new TwitterApi($config);
                    return new TwitterBridge($api);
                }
            }
        ];
    }

    /**
     * Finds the third party that can handle $key.
     *
     * @param string $key
     * @return Bridge
     * @throws UnsupportedThirdPartyKeyException
     */
    public function resolveByKey($key)
    {
        foreach ($this->finders as $finder) {
            $thirdParty = $finder($key);
            if (!$thirdParty) {
                continue;
            }

            return $thirdParty;
        }

        throw new UnsupportedThirdPartyKeyException(
            "No third party can handle '$key'.'"
        );
    }


}