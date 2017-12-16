<?php

namespace FeatureWeb\Page;
use \FeaturePhp as fphp;

class InstallProductPage extends ProductPage {
    public function getBody() {
        $this->product->export(new fphp\Exporter\LocalExporter(
            \FeatureWeb\Core::getInstance()->getInstallDirectory(), true));
        return call_user_func(\FeatureWeb\Core::getInstance()->getAfterInstallHook(), $this);
    }

    public function getNavigation() {
        return array(
            array("title" => "Back", "script" => "window.history.back();")
        );
    }
}

?>