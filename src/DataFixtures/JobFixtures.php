<?php

namespace App\DataFixtures;

use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class JobFixtures extends Fixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager) : void
    {
        $jobSensioLabs = new Job();
        $jobSensioLabs->setCategory($manager->merge($this->getReference('category-programming')));
        $jobSensioLabs->setType('full-time');
        $jobSensioLabs->setCompany('Lilita Carrio S.R.L.');
        $jobSensioLabs->setLogo('sensio-labs.gif');
        $jobSensioLabs->setUrl('http://www.sensiolabs.com/');
        $jobSensioLabs->setPosition('Dador de propinas');
        $jobSensioLabs->setLocation('Buenos Aires, Argentina');
        $jobSensioLabs->setDescription('Ya tenés experiencia dando propinas y querés darlas profesionalmente, este es tu trabajo.');
        $jobSensioLabs->setHowToApply('Mandá tu CV junto con el monto en propinas que diste a lo largo de los últimos 10 años a lilitasrl.com');
        $jobSensioLabs->setPublic(true);
        $jobSensioLabs->setActivated(true);
        $jobSensioLabs->setToken('job_sensio_labs');
        $jobSensioLabs->setEmail('job@example.com');
        $jobSensioLabs->setExpiresAt(new \DateTime('+30 days'));

        $jobExtremeSensio = new Job();
        $jobExtremeSensio->setCategory($manager->merge($this->getReference('category-design')));
        $jobExtremeSensio->setType('part-time');
        $jobExtremeSensio->setCompany('Lilita Carrio S.R.L.');
        $jobExtremeSensio->setLogo('extreme-sensio.gif');
        $jobExtremeSensio->setUrl('http://www.extreme-sensio.com/');
        $jobExtremeSensio->setPosition('Changas-Coimas');
        $jobExtremeSensio->setLocation('Chaco, Argentina');
        $jobExtremeSensio->setDescription('Se necesita alguien que haga changas.');
        $jobExtremeSensio->setHowToApply('Envía tu CV y las changas que haces a lilitasrl.com y si sabés coimear nos sirve también. Metele');
        $jobExtremeSensio->setPublic(true);
        $jobExtremeSensio->setActivated(true);
        $jobExtremeSensio->setToken('job_extreme_sensio');
        $jobExtremeSensio->setEmail('job@example.com');
        $jobExtremeSensio->setExpiresAt(new \DateTime('+30 days'));

        $jobExpired = new Job();
        $jobExpired->setCategory($manager->merge($this->getReference('category-programming')));
        $jobExpired->setType('full-time');
        $jobExpired->setCompany('Sensio Labs');
        $jobExpired->setLogo('sensio-labs.gif');
        $jobExpired->setUrl('http://www.sensiolabs.com/');
        $jobExpired->setPosition('Web Developer Expired');
        $jobExpired->setLocation('Paris, France');
        $jobExpired->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit.');
        $jobExpired->setHowToApply('Send your resume to lorem.ipsum [at] dolor.sit');
        $jobExpired->setPublic(true);
        $jobExpired->setActivated(true);
        $jobExpired->setToken('job_expired');
        $jobExpired->setEmail('job@example.com');
        $jobExpired->setExpiresAt(new \DateTime('-10 days'));

        $manager->persist($jobSensioLabs);
        $manager->persist($jobExtremeSensio);
        $manager->persist($jobExpired);

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder() : int
    {
        return 2;
    }
}