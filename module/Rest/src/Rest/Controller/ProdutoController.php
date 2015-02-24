<?php

namespace Rest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class ProdutoController extends AbstractRestfulController {

    //metodo get
    public function getList() {

        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $data = $em->getRepository('Application\Entity\Produto')->findAll();

        return $data;

    }

    //metodo get
    public function get($id) {

        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $data = $em->getRepository('Application\Entity\Produto')->find($id);

        return $data;
    }

    //metodo post
    public function create($data) {

        $serviceProduto = $this->getServiceLocator()->get('Application\Service\Produto');
//        $nome = $data['nome'];

        $categoria = $serviceProduto->insert($data);

        if ($categoria) {
            return $categoria;
        } else {
            return array('success' => false);
        }
    }

    //metodo put
    // put
    public function update($id, $data)
    {
        $serviceProduto = $this->getServiceLocator()->get('Application\Service\Produto');
        $data['id']=$id;
        $produto = $serviceProduto->update($data);
        if($produto) {
            return $produto;
        } else {
            return array('success'=>false);
        }
    }
    
    //metodo delete
    public function delete($id) {
        $serviceProduto = $this->getServiceLocator()->get('Application\Service\Categoria');
        
        $result = $serviceProduto->delete($id);
        if($result){
                        return $result;
                        
        }
    }

}
