<?php

namespace FeatureWeb\Page;
use \FeaturePhp as fphp;

class IndexPage extends ProductLinePage {
    public function getBody() {
        return fphp\File\TemplateFile::render(
            "layouts/model-viz.html",
            array(
                array("assign" => "model",
                      "to" => $this->getModelXmlString()),
                array("assign" => "configuration", "to" => ""),
                array("assign" => "body", "to" => "")
            ),
            __DIR__
        );
    }

    public function getScripts() {
        return array(
            "vendor/ekuiter/feature-web/assets/js/jquery-3.2.1.min.js",
            "node_modules/feature-model-viz/bundle.js",
            "vendor/ekuiter/feature-web/assets/js/model-viz.js"
        );
    }

    public function getNavigation() {
        return array(
            array("title" => "Configure", "page" => "configurator")
        );
    }
}

?>