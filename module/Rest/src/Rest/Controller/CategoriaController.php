<?php

namespace Rest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class CategoriaController extends AbstractRestfulController {

    //metodo get
    public function getList() {

        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $data = $em->getRepository('Application\Entity\Categoria')->findAll();

        return $data;

//        $service = $this->getServiceLocator()->get('Rest\Service\ProcessJson');
//        
//        $service->setResponse($this->response);
//        
//        $service->setData($data);
//        
//        $this->response = $service->process();
//        
//        return $this->response;
    }

    //metodo get
    public function get($id) {

        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $data = $em->getRepository('Application\Entity\Categoria')->find($id);

        return $data;
    }

    //metodo post
    public function create($data) {

        $serviceCategoria = $this->getServiceLocator()->get('Application\Service\Categoria');
        $nome = $data['nome'];

        $categoria = $serviceCategoria->insert($nome);

        if ($categoria) {
            return $categoria;
        } else {
            return array('success' => false);
        }
    }

    //metodo put
    public function update($id, $data) {
        
        $serviceCategoria = $this->getServiceLocator()->get('Application\Service\Categoria');
        
        
        $param['id']=$id;
        $param['nome']=$data['nome'];
        $categoria = $serviceCategoria->update($param);

        if ($categoria) {
            return $categoria;
        } else {
            return array('success' => false);
        }
        
    }

    //metodo delete
    public function delete($id) {
        $serviceCategoria = $this->getServiceLocator()->get('Application\Service\Categoria');
        
        $result = $serviceCategoria->delete($id);
        if($result){
                        return $result;
                        
        }
    }

}
