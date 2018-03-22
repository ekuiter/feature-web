<?php

namespace FeatureWeb\Page;
use \FeaturePhp as fphp;

class ConfiguratorPage extends ProductLinePage {
    public function getBody() {
        return fphp\File\TemplateFile::render(
            "layouts/configurator.html",
            array(
                array("assign" => "script",
                      "to" => htmlspecialchars($_SERVER['PHP_SELF'])),
                array("assign" => "notice",
                      "to" => \FeatureWeb\Core::getInstance()->getConfiguratorNotice()),
                array("assign" => "model",
                      "to" => $this->getModelXmlString()),
                array("assign" => "configuration",
                      "to" => $this->getConfigurationXmlString())
            ),
            __DIR__
        );
    }

    public function getScripts() {
        return array(
            "vendor/ekuiter/feature-web/assets/js/jquery-3.2.1.min.js",
            "vendor/ekuiter/feature-web/assets/js/jquery.tristate.js",
            "node_modules/feature-configurator/bundle.js",
            "vendor/ekuiter/feature-web/assets/js/configurator.js"
        );
    }

    public function getNavigation() {
        return array(
            array("title" => "Back", "script" => "window.history.back();"),
            array("title" => "Configure", "class" => "export disabled"),
            array("title" => "Reset", "script" => "window.app.render();")
        );
    }
}

?>