<?php namespace Presenters\Pages;

use Taujor\PHPSSG\Contracts\Buildable;
use Presenters\Layouts\Base;
use Presenters\Components\Hello;

class Home extends Buildable {
    function __construct(private Base $base, private Hello $hello){}

    function __invoke(){
        return ($this->base)(
            ($this->hello)()
        );
    }
}