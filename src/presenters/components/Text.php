<?php namespace Presenters\Components;

use Taujor\PHPSSG\Contracts\Renderable;

class Text extends Renderable {
    function __invoke(string $content){
        return $this->render("components/text", ["content" => $content]);        
    }
}