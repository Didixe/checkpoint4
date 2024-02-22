<?php

namespace App\Tests\unit;

use App\Entity\Instrument;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class InstrumentEntityTest extends KernelTestCase
{
    public function testEntityIsValid(): void
    {
        $kernel = self::bootKernel();

        $container = static::getContainer();

        $instrument = new Instrument();
        $instrument->setName('E longa')
            ->setNoteNumber (7)
            ->setMaterials('Acier nitruré')
            ->setTuning('440Hz')
            ->setPicture(null)
            ->setPrice('800 €');

        $errors = $container->get('validator')->validate($instrument);

        $this->assertCount(0, $errors);
    }

    public function testInvalidName(): void
    {
        self::bootKernel();

        $container = static::getContainer();

        $instrument = new Instrument();
        $instrument->setName('')
            ->setNoteNumber (7)
            ->setMaterials('Acier nitruré')
            ->setTuning('440Hz')
            ->setPicture(null)
            ->setPrice('800 €');

        $errors = $container->get('validator')->validate($instrument);

        $this->assertCount(1, $errors);
    }
}
