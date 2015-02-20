<?php
namespace Application\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Application\Entity\Categoria;

class LoadCategoria extends AbstractFixture implements OrderedFixtureInterface{
    
    
    public function load(ObjectManager $manager) {
        
        $categoria = new Categoria();
        
        $categoria->setNome("Livros");
        $manager->persist($categoria);
        $this->addReference('categoria-livros', $categoria);
        
        $categoria = new Categoria();
        $categoria->setNome("Computador");
        $manager->persist($categoria);
        $this->addReference('categoria-computador', $categoria);

        
        $manager->flush();
        
    }

    public function getOrder() {
        return 1;
    }

}
