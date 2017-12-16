<?php

namespace FeatureWeb\Page;
use \FeaturePhp as fphp;

class ConfigurationPage extends ProductLinePage {
    public function getBody() {
        return fphp\File\TemplateFile::render(
            "layouts/model-viz.html",
            array(
                array("assign" => "model",
                      "to" => $this->getModelXmlString()),
                array("assign" => "configuration",
                      "to" => $this->getConfigurationXmlString()),
                array("assign" => "body",
                      "to" => $this->configuration->renderAnalysis($this->productLine))
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
        $links = array(
            array("title" => "Back", "script" => "window.history.back();")
        );
        if ($this->configuration->isValid())
            $links[] = array("title" => "Generate", "page" => "product", "preserve" => array("configuration"));
        if ($this->configuration !== $this->productLine->getDefaultConfiguration())
            $links[] = array("title" => "Reset", "page" => "configuration");
        return $links;
    }
}

?>