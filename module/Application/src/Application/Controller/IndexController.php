<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Categoria;
use Application\Entity\Produto;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository("Application\Entity\Categoria");
        
//        $categoria = new Categoria();
//        $categoria->setNome("notebook");
//        
//        $em->persist($categoria);//preparar para gravar
//        $em->flush(); //grava no banco
//        
       
//        $categoriaService = $this->getServiceLocator()->get('Application\Service\Categoria');
//        $categoriaService->insert('monitores');
//        $categoriaService->update(array('id'=>4, 'nome'=>'monitor'));
//        $categoriaService->delete(4);
        
        $categorias = $repo->findAll();
        
        //pegar o primeiro registro da tabela categoria
//        $categoria = $repo->find(1);
//        
//        $produto = new Produto();
//        $produto->setNome("game a");
//        $produto->setDescricao("game a e muito legal");
//        $produto->setCategoria($categoria);
//             
//        $em->persist($produto);//preparar para gravar
//        $em->flush(); //grava no banco
        
        $produtoService = $this->getServiceLocator()->get('Application\Service\Produto');
        
//        $produtoService->insert(array('nome'=>'game b', 'categoriaId'=>1));
                $produtoService->delete(2);

        return new ViewModel(array('categorias'=>$categorias));
    }
}
