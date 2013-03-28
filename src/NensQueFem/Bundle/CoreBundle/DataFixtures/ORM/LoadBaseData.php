<?php
/**
 * @author Jordi Llonch <llonch.jordi@gmail.com>
 * @date 06/03/13 22:27
 */

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use NensQueFem\Bundle\CoreBundle\Entity;

class LoadBaseData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $city = new Entity\City();
        $city->setId(Entity\City::$BARCELONA);
        $city->setName('Barcelona');
        $manager->persist($city);



        $category = new Entity\Category();
        $category->setId(Entity\Category::$ANIMACIO);
        $category->setName('Animació');
        $category->setKeyWords('animació,animacio');
        $manager->persist($category);

        $category = new Entity\Category();
        $category->setId(Entity\Category::$CINEMA);
        $category->setName('Cinema');
        $category->setKeyWords('cine,cinema');
        $manager->persist($category);

        $category = new Entity\Category();
        $category->setId(Entity\Category::$CIRC);
        $category->setName('Circ');
        $category->setKeyWords('circ');
        $manager->persist($category);

        $category = new Entity\Category();
        $category->setId(Entity\Category::$CONTES);
        $category->setName('Contes');
        $category->setKeyWords('conte,contes');
        $manager->persist($category);

        $category = new Entity\Category();
        $category->setId(Entity\Category::$EXPOSICIO);
        $category->setName('Exposició');
        $category->setKeyWords('exposició,mostra,exposicions,mostres');
        $manager->persist($category);

        $category = new Entity\Category();
        $category->setId(Entity\Category::$JOCS);
        $category->setName('Jocs');
        $category->setKeyWords('jocs,joc');
        $manager->persist($category);

        $category = new Entity\Category();
        $category->setId(Entity\Category::$TALLER);
        $category->setName('Taller');
        $category->setKeyWords('tallers,taller,curs');
        $manager->persist($category);

        $category = new Entity\Category();
        $category->setId(Entity\Category::$LITERATURA);
        $category->setName('Literatura');
        $category->setKeyWords('literatura,poema,poemes,llibre,llibres,xerrada');
        $manager->persist($category);

        $category = new Entity\Category();
        $category->setId(Entity\Category::$EXCURSIONS);
        $category->setName('Excursions');
        $category->setKeyWords('excursió,excursio,excursions,itinerari,caminada,ruta');
        $manager->persist($category);


        $manager->flush();
    }
}