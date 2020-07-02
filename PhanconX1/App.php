<?php


namespace fantomx1\PhanconX1;


/**
 * Class App
 * @package framework
 */
class App
{

    /**
     * @var
     */
    public static $app;
    /**
     * @var Di
     */
    public $di;


    /**
     * App constructor.
     * @param $config
     * @param ServiceContainerInterface|null $serviceContainer
     */
    public function __construct($config, ServiceContainerInterface $serviceContainer = null)
    {

        $this->di = $serviceContainer;

        $config = $config + $this->defaultServices();

        if ($serviceContainer) {
            $this->di = $serviceContainer;
        } else {
            $this->di = new Di($config);
        }


        static::$app = $this;

    }


    /**
     * @return mixed
     */
    public function run()
    {
        $route = App::$app->di->getS('router')->getRoute();
        //$route = App::$app->di->Router->getRoute();
        $controller = '\controllers\\'.$route[0]."Controller";
        $controller = new $controller();
//        call_user_func(
//            [$controller, "action".$route[1]]
//        );
        return $controller->{"action".$route[1]}();
    }


    /**
     * @return array
     */
    private function defaultServices()
    {


        return [
            'Router'=>[
                'class' => Router::class,
            ],
        ];

    }

}
