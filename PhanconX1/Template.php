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
    public function __construct(BaseController $controller)
    {
        $this->controller =$controller;

    }

    /**
     * @param $template
     * @param BaseController $controller
     * @return string
     * @throws \ReflectionException
     */
    public static function locateTemplate($template, BaseController  $controller, $relative = false)
    {

        $reflector = new \ReflectionClass($controller);
        $fn = $reflector->getFileName();
        $dir = dirname($fn).'/../views';
        $basename = str_replace("Controller.php", "", basename($fn));
        $path =  $basename.'/'.$template.'.php';
        if (!$relative) {
            $path = $dir.'/'. $path;
        }

        return $path;
    }


    /**
     * @param $template
     * @param $params
     * @throws \ReflectionException
     */
    public function render($template, $params, $contents = null)
    {

        // variable to be used inside the included layout
        $content = $contents;

        $path = static::locateTemplate($template, $this->controller);

        if (!$contents) {
            extract($params);
            ob_start();
            include $path;
            $content = ob_get_clean();
        }

        include dirname($path, 2)."/layout/main.php";


    }




}
