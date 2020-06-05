<?php


namespace framework;


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
     */
    public function __construct($config)
    {
        $config = $config + $this->defaultServices();


        $this->di = new Di($config);

        static::$app = $this;

    }


    /**
     * @return mixed
     */
    public function run()
    {

        $route = App::$app->di->Router->getRoute();
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
