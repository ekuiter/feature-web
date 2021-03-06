<?php

namespace FeatureWeb\Page;
use \FeaturePhp as fphp;

class ProductPage extends ProductLinePage {
    protected $product;
    
    public function __construct() {
        parent::__construct();
        $this->product = $this->productLine->getProduct($this->configuration);
    }
    
    public function getBody() {
        return $this->product->renderAnalysis();
    }

    public function getNavigation() {
        $links = array(
            array("title" => "Back", "script" => "window.history.back();"),
        );
        if (\FeatureWeb\Core::getInstance()->downloadZipEnabled())
            $links[] = array("title" => "Download ZIP", "page" => "download_product", "preserve" => array("configuration"));
        if (\FeatureWeb\Core::getInstance()->localInstallEnabled())
            $links[] = array("title" => "Local Install", "page" => "install_product", "preserve" => array("configuration"));
        return $links;
    }
}

?>