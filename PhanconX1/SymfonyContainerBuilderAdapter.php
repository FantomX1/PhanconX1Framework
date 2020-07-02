<?php


namespace fantomx1\PhanconX1;


use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class SymfonyContainerBuilderAdapter
 * @package fantomx1\PhanconX1
 */
class SymfonyContainerBuilderAdapter extends ContainerBuilder implements ServiceContainerInterface
{


    /**
     * @param String $service
     * @return object|null
     * @throws \Exception
     */
    public function getS(String $service)
    {
        return $this->get($service);
    }


}
