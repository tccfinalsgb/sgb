<?php
class controller {
    protected $db;
    public function __construct(){
        global $pdo;
        $this->db = $pdo;
    }
    public function loadView($viewName, $viewData = array()){
        extract($viewData);
        include 'views/'.$viewName.'.php';
    }
    
    public function loadTemplate($viewName, $viewData = array()){
        include 'views/template.php';
    }
    
    public function loadTemplateCliente($viewName, $viewData = array()){
        include 'views/template_cliente.php';
    }
    
    public function loadTemplateFuncionario($viewName, $viewData = array()){
        include 'views/template_funcionario.php';
    }
        
    public function loadViewInTemplate($viewName, $viewData){
        extract($viewData);
        include 'views/'.$viewName.'.php';
    }
    
}