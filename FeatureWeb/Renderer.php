<?php

namespace FeatureWeb;
use \FeaturePhp as fphp;

class Renderer {
    private $page;
    private $exception = null;

    public function __construct($page = "index", $arg = null) {
        if (!$page)
            $page = "index";
        $page = preg_replace('/[^a-zA-Z0-9_]+/', '', $page);
        $page = str_replace(' ', '', ucwords(str_replace('_', ' ', $page)));
        $class = "\FeatureWeb\Page\\{$page}Page";
        if (!class_exists($class))
            $class = "\FeatureWeb\Page\NotFoundPage";
        header("Content-Type: text/html; charset=utf-8");
        
        try {
            $this->page = new $class($arg);
        } catch (\Exception $e) {
            $this->exception = $e;
        }
    }

    public function render() {
        try {
            if ($this->exception)
                throw $this->exception;

            $layout = $this->page->getLayout();
            if ($layout)           
                echo fphp\File\TemplateFile::render(
                    $layout,
                    array(
                        array("assign" => "scripts", "to" => $this->getScripts()),
                        array("assign" => "title", "to" => $this->page->getTitle()),
                        array("assign" => "body", "to" => $this->page->getBody()),
                        array("assign" => "nav", "to" => $this->getNavigation())
                    ),
                    __DIR__);
            else
                $this->page->render();
            
        } catch (\Exception $e) {
            if (get_class($this->page) === "ErrorPage")
                echo $e->getMessage();
            else
                (new Renderer("error", $e))->render();
        }
    }

    private function getScripts() {
        $scripts = "";
        foreach ($this->page->getScripts() as $script)
            $scripts .= "<script src=\"$script\"></script>\n";
        return $scripts;
    }

    private function getNavigation() {
        $nav = "<ul>";
        foreach ($this->page->getNavigation() as $link) {
            $href = isset($link["page"]) ? "?p=$link[page]" :
                  (isset($link["href"]) ? $link["href"] : "javascript:void(0)");
            $class = isset($link["class"]) ? "class=\"$link[class]\"" : "";
            $script = isset($link["script"]) ? "onclick=\"$link[script]\"" : "";

            $query = array();
            if (isset($link["preserve"]))
                foreach ($link["preserve"] as $preserve)
                    if (isset($_REQUEST[$preserve]))
                        $query[$preserve] = $_REQUEST[$preserve];
            if (!empty($query))
                $href .= "&" . http_build_query($query);
            
            $nav .= "<li $class><a href=\"$href\" $script>$link[title]</a></li>\n";
        }
        $nav .= "</ul>";
        return $nav;
    }
}

?>