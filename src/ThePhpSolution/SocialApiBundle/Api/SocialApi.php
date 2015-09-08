<?php
/**
 * Created by PhpStorm.
 * User: jmac
 * Date: 9/5/2015
 * Time: 11:42 AM
 */

namespace ThePhpSolution\SocialApiBundle\Api;


use Symfony\Component\DependencyInjection\Container;
use ThePhpSolution\SocialApiBundle\Api\Enum\ThirdPartyEnum;
use ThePhpSolution\SocialApiBundle\Api\User\User;
use ThePhpSolution\SocialApiBundle\Integration\Bridge;
use ThePhpSolution\SocialApiBundle\Integration\ThirdParty;
use ThePhpSolution\SocialApiBundle\Integration\ThirdPartyResolver;

class SocialApi
{
    /** @var Container */
    protected $container;

    /**
     * SocialApi constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }


    public function overwriteUserData(User $user, $key, ThirdParty $party = null)
    {
        if (!$party) {
            $resolver = new ThirdPartyResolver($this->container);
            $party = $resolver->resolveByKey($key);
        }

        /** @var Bridge $party */
        $party->overwriteUserData($user, $key);
        return $this;
    }
}