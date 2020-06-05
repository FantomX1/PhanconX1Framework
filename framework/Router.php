<?php


namespace framework;


/**
 * Class Router
 * @package framework
 */
class Router
{


    /**
     * @var
     */
    public $controller;

    /**
     * @var
     */
    public $action;

    /**
     * @return array
     */
    public function getRoute()
    {

        // a get params lepsie, a kady preprocessed, ci len params,
        // a alebo aj konkretne a druh kontroleru si zisti
        // ktore parametre si prevezme, ze rpc si kontrolelr nevezme ani z url
        // resp aj z url ale akciu nie z url

        $controller = "Site";
        $action = "index";

        // @TODO: modules later
        if (isset($_GET['r'])) {

            $elements = explode('/' , $_GET['r']);
            $controller =  $elements[0] ? $elements[0]: $controller;
            $action =  $elements[1] ? $elements[1]: $action;
        }


        // route rules a route generation
        // a aj iny format a ci aj povoluje
        $this->controller = $controller;
        $this->action = $action;

        return [$controller, $action];
    }


}
