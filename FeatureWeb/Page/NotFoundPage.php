<?php

namespace FeatureWeb\Page;
use \FeaturePhp as fphp;

class NotFoundPage extends Page {
    public function __construct() {
        http_response_code(404);
    }
    
    public function getBody() {
        return "<h1>404 Not Found</h1>";
    }
}

?>