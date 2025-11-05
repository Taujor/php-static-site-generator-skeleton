<?php namespace Presenters\Components;

use Taujor\PHPSSG\Contracts\Renderable;

class Link extends Renderable {
    function __invoke(string $route, string $content){
        return $this->render("components/link", ["route" => $route, "content" => $content]);        
    }
}