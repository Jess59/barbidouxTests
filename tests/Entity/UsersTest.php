<?php

namespace App\Tests\Entity;

use App\Entity\Users;
use PHPUnit\Framework\TestCase;

class UsersTest extends TestCase
{
    public function testUserEmail()
    {
        $user = new Users();
        $email = 'test@example.com';
        $user->setMailUser($email);
        
        $this->assertSame($email, $user->getMailUser());
    }

    public function testUserPassword()
    {
        $user = new Users();
        $password = 'password123';
        $user->setPassword($password);
        
        $this->assertSame($password, $user->getPassword());
    }

    public function testUserRoles()
    {
        $user = new Users();
        $roles = ['ROLE_ADMIN'];
        $user->setRoles($roles);
        
        $this->assertContains('ROLE_ADMIN', $user->getRoles());
        $this->assertContains('ROLE_USER', $user->getRoles());
    }

    public function testUserIdentifier()
    {
        $user = new Users();
        $email = 'test@example.com';
        $user->setMailUser($email);

        $this->assertSame($email, $user->getUserIdentifier());
    }
}
