<?php namespace Presenters\Components;

use Taujor\PHPSSG\Contracts\Renderable;

class Github extends Renderable {
    function __invoke(){
        return $this->render("components/github");        
    }
}