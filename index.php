<?php

// require feature-web and feature-php
require_once "vendor/autoload.php";

// get the feature-web core instance
$featureWeb = \FeatureWeb\Core::getInstance();

// tell feature-web about the product line settings (required)
$featureWeb->setProductLineSettings(
    \FeaturePhp\ProductLine\Settings::fromFile("spl/feature-ide.json"));

// temporary directory used for ZIP export (optional)
// if supplied, this directory has to exist and be writable
$featureWeb->setTemporaryDirectory("tmp");

// directory used for local install (optional)
// if it does not exist, the directory is created,
// otherwise it is overwritten
// $featureWeb->setInstallDirectory("tmp/feature-ide");

// hook called after local install (optional)
// this can be used to initialize the installed product
$featureWeb->setAfterInstallHook(function($page) {
    $configuration = $page->getConfiguration();
    $productLine = $page->getProductLine();
    // do initialization ...
    return ""; // returns some HTML (e.g. status information)
});

// renders the page according to the GET parameter "p"
$featureWeb->render();

?>
