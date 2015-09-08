<?php

namespace ThePhpSolution\SocialApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ThePhpSolution\SocialApiBundle\Api\SocialApi;
use ThePhpSolution\SocialApiBundle\Entity\ExampleUser;

class RegisterController extends Controller
{
    /**
     * @Route("/signup")
     * @Template()
     */
    public function signupAction()
    {
        $user = new ExampleUser();

        $api = new SocialApi($this->container);
        $api->overwriteUserData($user, '@Phreakware');
        print_r($user);
        exit;

        $this->getDoctrine()->getManager()->persist($user);
        $this->getDoctrine()->getManager()->flush();

        die('sdf');
        return [];
    }
}
