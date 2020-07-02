<?php


namespace fantomx1\PhanconX1;


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

        // @TODO: different input parsing for RPC type of controllers, ws controller WIP

        $controller = "Site";
        $action = "index";

        // @TODO: modules later
        if (isset($_GET['r'])) {

            $elements = explode('/' , $_GET['r']);
            $controller =  $elements[0] ? $elements[0]: $controller;
            $action =  $elements[1] ? $elements[1]: $action;
        }


        // @TODO: route rules routing
        $this->controller = $controller;
        $this->action = $action;

        return [$controller, $action];
    }


}
