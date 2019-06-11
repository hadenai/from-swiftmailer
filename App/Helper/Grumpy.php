<?php


namespace App\Helper;


require_once 'Grumpy.php';
require_once 'Collar.php';

use App\Helper\Collar\Collar;
use App\Helper\Cat\Cat;

$collar = new Collar( 100, 'red' );

$grumpy = new Cat( 'Grumpy', 'grey', $collar );
$garfield = new Cat( 'Garfield', 'ginger' );

$garfield->setFatigue ( 50 );
$garfield->setImage ( 'Cat' );
$garfield->setColor ( 'red' );

while (!$garfield->isTired ()) {
    $garfield->walk ();
}

$grumpy->setFatigue ( 150 );
$grumpy->setImage ( 'Cat1' );
