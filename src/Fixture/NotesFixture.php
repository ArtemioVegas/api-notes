<?php

namespace App\Fixture;

use App\Entity\Note;
use App\Entity\User;
use DateTime;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Exception;

class NotesFixture extends Fixture implements OrderedFixtureInterface
{
    public function getOrder()
    {
        return 1;
    }

    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager)
    {
        /**
         * @var User $user
         */
        $words = explode(' ', 'Now that there is the Tec-9, a crappy spray gun from South Miami. This gun is advertised as the most popular gun in American crime. Do you believe that shit? It actually says that in the little book that comes with it: the most popular gun in American crime. Like actually proud of that shit.');
        $minSeconds = 2*24*60*60;
        $maxSeconds = 5*24*60*60;
        $amount = 20;
        for ($i = 1; $i <= $amount; $i++) {
            shuffle($words);
            $body = implode(' ', $words);
            $title = substr($body, 0, 60) . ' ...';
            $user = $this->getReference('user_' . $i);
            $fixture = (new Note())
                ->setTitle($title)
                ->setBody($body)
                ->setUser($user)
                ->setCreatedAt(new DateTimeImmutable('- ' . mt_rand($minSeconds, $maxSeconds) . ' seconds'))
                ->setUpdatedAt(new DateTime('- ' . mt_rand(1, $minSeconds) . ' seconds'))
            ;
            $manager->persist($fixture);
            $this->setReference('note_' . $i, $fixture);
        }

        $manager->flush();
    }
}
