<?php

namespace FeatureWeb;
use \FeaturePhp as fphp;

class Core {
    private static $instance = null;
    private $productLineSettings = null;
    private $temporaryDirectory = null;
    private $installDirectory = null;
    private $afterInstallHook = null;

    private function __construct() {}
    private function __clone() {}

    public static function getInstance() {
        if (self::$instance === null)
            self::$instance = new self();
        return self::$instance;
    }

    public function render($page = null) {
        if (!$page)
            $page = isset($_GET["p"]) ? $_GET["p"] : null;
        $renderer = new Renderer($page);
        $renderer->render();
    }

    public function getProductLineSettings() {
        if (!$this->productLineSettings)
            throw new \Exception("no product line settings set");
        return $this->productLineSettings;
    }

    public function setProductLineSettings($productLineSettings) {
        $this->productLineSettings = $productLineSettings;
    }

    public function downloadZipEnabled() {
        return !!$this->temporaryDirectory;
    }

    public function localInstallEnabled() {
        return !!$this->installDirectory;
    }

    public function getTemporaryDirectory() {
        if (!$this->temporaryDirectory)
            throw new \Exception("no temporary directory set");
        return $this->temporaryDirectory;
    }

    public function setTemporaryDirectory($temporaryDirectory) {
        $this->temporaryDirectory = $temporaryDirectory;
    }

    public function getInstallDirectory() {
        if (!$this->installDirectory)
            throw new \Exception("no install directory set");
        return $this->installDirectory;
    }

    public function setInstallDirectory($installDirectory) {
        $this->installDirectory = $installDirectory;
    }

    public function getAfterInstallHook() {
        if (!$this->afterInstallHook)
            return function($page) {
                return "";
            };
        return $this->afterInstallHook;
    }

    public function setAfterInstallHook($afterInstallHook) {
        $this->afterInstallHook = $afterInstallHook;
    }
}

?>