<?php

namespace FeatureWeb\Page;
use \FeaturePhp as fphp;

abstract class Page {
    abstract public function getBody();

    public function getTitle() {
        return "";
    }

    public function getScripts() {
        return array();
    }

    public function getNavigation() {
        return array();
    }

    public function getLayout() {
        return "Page/layouts/application.html";
    }

    public function render() {}
}

?>