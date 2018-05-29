<?php
namespace App\Test\Service;

use App\Entity\User;
use App\Service\HappyNumberGenerator;
use App\Service\Mailer;
use App\Service\UserMailer;
use PHPUnit\Framework\TestCase;

Class UserMailerTest extends TestCase{

    public  function  testSendHello()
    {
        $mailer =$this->createMock(Mailer::class);
        $mailer->expects($this->once())
        ->method('send')
        ->with('mail@exemp.lt', 'Hello Vardenis.Your Happy number: 2');

        $happyNumberGenerator = $this->createMock(HappyNumberGenerator::class);
        $happyNumberGenerator->expects($this->any())
         ->method('generate')
        ->willReturn(2);
        $user = new User();
        $user->setName('Vardenis');
        $user->setEmail('mail@exemp.lt');

        $service = new UserMailer($mailer, $happyNumberGenerator);
        $service->sendHello($user);

    }

}