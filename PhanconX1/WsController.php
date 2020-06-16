<?php


namespace fantomx1\PhanconX1;


/**
 * Class WsController
 * @package framework
 */
class WsController
{


    /**
     * WsController constructor.
     */
    public function __construct()
    {
        $_POST = json_decode($_POST,true);
    }

}
