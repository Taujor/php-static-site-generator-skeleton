<?php namespace Presenters\Components;

use Taujor\PHPSSG\Contracts\Composable;
use Presenters\Components\Text;
use Presenters\Layouts\Container;

class Hello extends Composable {
    function __construct(
        private Title $title,
        private Link $link,
        private Github $github,
        private Text $text,
        private Container $container,
    ) {}

    function _beforeInvoke(): void {
        
    }
   
    function __invoke(): string {
        return ($this->container)(
            ($this->title)("Hello World") .
            ($this->text)("Thank you for trying out phpssg, more examples and better documentation is coming soon!") .
            ($this->text)("Pssst, did you star the repo?") .
            ($this->link)("https://github.com/taujor/php-static-site-generator", 
                ($this->github)()
            )
        );
    }
}