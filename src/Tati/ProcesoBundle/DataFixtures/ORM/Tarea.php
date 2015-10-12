<?php
namespace Cupon\OfertaBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Cupon\OfertaBundle\Entity\Tarea;

class Tarea extends AbstractFixture implements OrderedFixtureInterface
{
   
    public function load(ObjectManager $manager)
    {

        //Carga de datos de una tarea nueva
        $Tarea = new Tarea();
        $Tarea->setNombre('Tarea1');
        $Tarea->setDescripcion('esta tarea se encarga de una cosa tal');
        $manager->persist($Tarea);
        $manager->flush();
    }
    
}