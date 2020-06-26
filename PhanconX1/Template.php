<?php


namespace fantomx1\PhanconX1;


/**
 * Class Template
 * @package framework
 */
class Template
{
    /**
     * @var
     */
    private $controller;

    /**
     * Template constructor.
     * @param $controller
     */
    public function __construct($controller)
    {
        $this->controller =$controller;

    }


    /**
     * @param $template
     * @param $params
     * @throws \ReflectionException
     */
    public function render($template, $params)
    {

        $reflector = new \ReflectionClass($this->controller);
        $fn = $reflector->getFileName();
        $dir = dirname($fn).'/../views';
        $basename = str_replace("Controller.php", "", basename($fn));



        extract($params);
        ob_start();
        include $dir.'/'.$basename.'/'.$template.'.php';
        $content = ob_get_clean();

        include $dir."/layout/main.php";


    }




}
