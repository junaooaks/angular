<?php
namespace Rest\Service;

use Zend\Http\Response;

class ProcessJson {
    
    private $data;
    private $serialize;
    private $response;
    
    public function __construct(Response $response = null, $data = null, $serializer = null) {
        
        $this->response = $response;
        $this->data     = $data;
        $this->serialize= $serializer;
        
    }
    
    public function process() {
        
        $serializer = $this->serialize;
        $result = $serializer->serialize($this->data, 'json');
        
        $this->response->setContent($result);
        
        
        //mudar para json 
        $headers = $this->response->getHeaders();
        $headers->addHeaderLine('Content-type','application/json');
        $this->response->setHeaders($headers);
        
        return $this->response;
        
    }
    
    
    function getData() {
        return $this->data;
    }

    function getSerialize() {
        return $this->serialize;
    }

    function getResponse() {
        return $this->response;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setSerialize($serialize) {
        $this->serialize = $serialize;
    }

    function setResponse($response) {
        $this->response = $response;
    }


}
