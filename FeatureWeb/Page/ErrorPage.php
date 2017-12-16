<?php

namespace FeatureWeb\Page;
use \FeaturePhp as fphp;

class ErrorPage extends Page {
    private $exception;
    
    public function __construct($exception) {
        $this->exception = $exception;
        http_response_code(500);
    }
    
    public function getBody() {
        return "<h1>Internal Server Error</h1>\n"
            . "<p>A <b>" . get_class($this->exception) . "</b> was thrown:</p>\n"
            . "<p>" . $this->exception->getMessage() . "</p>";
    }
}

?>