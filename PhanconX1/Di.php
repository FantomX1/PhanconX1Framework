<?php


namespace fantomx1\PhanconX1;


/**
 * Class Di
 * @package framework
 */
class Di implements ServiceContainerInterface
{

    /**
     * @var array
     */
    private $registry = [];

    /**
     * @var
     */
    private $config;

    /**
     * Di constructor.
     * @param $config
     */
    public function __construct($config)
    {

        $this->config = $config;

        
    }

    /**
     * @param String $service
     * @return mixed
     */
    public function getS(String $service)
    {
        return $this->$service;
    }

    /**
     * @param $service
     * @return mixed
     * @throws \Exception
     */
    public function __get($service)
    {

        if (!isset($this->config[$service])) {
            throw new \Exception("Service ".$service." does not exist");
        }

        if (!isset($this->registry[$service])) {
            $config = $this->config[$service];
            $parameters = $config;
            unset($parameters['class']);
            $this->$service = $this->registry[$service] = new $config['class']($parameters);

        }
        // @TODO: component object


        return $this->registry[$service];
    }


//    public function get($service)
//    {
//
//
//        if (isset($this->registry[$service])) {
//
//            return $this->registry[$service];
//        }
//
//        $config = $this->config[$service] ?? [];
//
//
//        if ($config) {
//
//            $parameters=$config;
//            unset($parameters['class']);
//            $this->registry[$service] = new $config['class']($parameters);
//        }
//
//
//        // a prerusenai ale if nei anstavit a rvatit
//
//
//        return $this->registry[$service];
//    }
    
    

}
