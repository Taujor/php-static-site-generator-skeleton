<?php namespace Presenters\Layouts;

use Taujor\PHPSSG\Contracts\Renderable;

class Base extends Renderable {
    function __invoke($content): string {
        return $this->render("layouts/base", [
            "content" => $content
        ]);
    }
}