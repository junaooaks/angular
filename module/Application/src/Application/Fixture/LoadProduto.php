<?php
namespace Application\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Application\Entity\Produto;

class LoadProduto extends AbstractFixture implements OrderedFixtureInterface{
    
    
    public function load(ObjectManager $manager) {
        
        $categoriaLivros = $this->getReference('categoria-livros');
        $categoriaComputador = $this->getReference('categoria-computador');
        
        $produto = new Produto();
        
        $produto->setNome("orientação a objeto")
                ->setCategoria($categoriaLivros)
                ->setDescricao("descricao do livro");
        
        $manager->persist($produto);
        
        
        $produto = new Produto();
        
        $produto->setNome("macbook")
                ->setCategoria($categoriaComputador)
                ->setDescricao("descricao computador");
        
        $manager->persist($produto);
        
        $manager->flush();
        
    }
    public function getOrder() {
        return 2;
    }
}
