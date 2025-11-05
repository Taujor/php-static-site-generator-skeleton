<?php namespace Presenters\Components;

use Taujor\PHPSSG\Contracts\Renderable;

class Title extends Renderable {
    function __invoke(string $content){
        return $this->render("components/title", ["content" => $content]);        
    }
}