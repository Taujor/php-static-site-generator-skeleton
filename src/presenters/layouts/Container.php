<?php namespace Presenters\Layouts;

use Taujor\PHPSSG\Contracts\Renderable;

class Container extends Renderable {
    function __invoke($content): string {
        return $this->render("layouts/container", [
            "content" => $content
        ]);
    }
}