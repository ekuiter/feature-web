<?php

namespace FeatureWeb\Page;
use \FeaturePhp as fphp;

abstract class ProductLinePage extends Page {
    protected $productLine;
    protected $configuration;
    
    public function __construct() {
        $this->productLine = new fphp\ProductLine\ProductLine(
            \FeatureWeb\Core::getInstance()->getProductLineSettings());

        if (isset($_REQUEST["configuration"]))
            $this->configuration = new fphp\Model\Configuration(
                $this->productLine->getModel(),
                fphp\Model\XmlConfiguration::fromRequest("configuration")
            );
        else
            $this->configuration = $this->productLine->getDefaultConfiguration();
        fphp\Specification\ReplacementRule::setConfiguration($this->configuration);
    }

    public function getTitle() {
        return $this->productLine->getName();
    }

    public function getProductLine() {
        return $this->productLine;
    }

    public function getConfiguration() {
        return $this->configuration;
    }

    public function getModelXmlString() {
        return $this->productLine->getModel()->getXmlModel()->getXmlParser()->getXmlString();
    }

    public function getConfigurationXmlString() {
        return $this->configuration->getXmlConfiguration()->getXmlParser()->getXmlString();
    }
}

?>