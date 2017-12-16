<?php

namespace FeatureWeb\Page;
use \FeaturePhp as fphp;

class DownloadProductPage extends ProductPage {
    public function getLayout() {
        return null;
    }

    public function render() {
        $this->product->export(new fphp\Exporter\DownloadZipExporter(
            \FeatureWeb\Core::getInstance()->getTemporaryDirectory()));
    }
}

?>