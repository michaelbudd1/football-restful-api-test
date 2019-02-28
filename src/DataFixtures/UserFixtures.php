<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Firebase\JWT\JWT;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $email = 'michaelbudd6@gmail.com';

        $token = [
            'secret' => 'uyisdjdhjfds@*@356999524',
            'email'  => $email,
        ];

        $jwt = JWT::encode($token, getenv('JWT_TOKEN_KEY'));


        $user = new User();
        $user->setEmail($email);
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'password123'
        ));
        $user->setToken($jwt);

        $manager->persist($user);

        $manager->flush();
    }
}
