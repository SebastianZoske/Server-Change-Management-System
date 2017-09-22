<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();
$collection->add('cducsuscms_homepage', new Route('/hello/{name}', array(
    '_controller' => 'CDUCSUSCMSBundle:Default:index',
)));

return $collection;
