<?php

namespace App\DataFixtures;

use App\Entity\Instrument;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class InstrumentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $instrument = new Instrument();
        $instrument->setName('E longa');
        $instrument->setNoteNumber(7);
        $instrument->setMaterials('Acier nitruré');
        $instrument->setTuning('440Hz');
        $instrument->setPicture('');
        $instrument->setPrice('800 €');
        $manager->persist($instrument);
        $manager->flush();
        $this->addReference('instru0', $instrument);

        $instrument = new Instrument();
        $instrument->setName('D Amara');
        $instrument->setNoteNumber(8);
        $instrument->setMaterials('Acier nitruré');
        $instrument->setTuning('440Hz');
        $instrument->setPicture('');
        $instrument->setPrice('890 €');
        $manager->persist($instrument);
        $manager->flush();
        $this->addReference('instru1', $instrument);

        $instrument = new Instrument();
        $instrument->setName('D Kurd');
        $instrument->setNoteNumber(9);
        $instrument->setMaterials('Acier nitruré');
        $instrument->setTuning('440Hz');
        $instrument->setPicture('');
        $instrument->setPrice('1000 €');
        $manager->persist($instrument);
        $manager->flush();
        $this->addReference('instru2', $instrument);

        $instrument = new Instrument();
        $instrument->setName('D Kurd/Amara');
        $instrument->setNoteNumber(10);
        $instrument->setMaterials('Acier nitruré');
        $instrument->setTuning('440Hz');
        $instrument->setPicture('');
        $instrument->setPrice('1150 €');
        $manager->persist($instrument);
        $manager->flush();
        $this->addReference('instru3', $instrument);

        $instrument = new Instrument();
        $instrument->setName('D Amara');
        $instrument->setNoteNumber(12);
        $instrument->setMaterials('Ember');
        $instrument->setTuning('440Hz');
        $instrument->setPicture('');
        $instrument->setPrice('1380 €');
        $manager->persist($instrument);
        $manager->flush();
        $this->addReference('instru4', $instrument);
    }
}
