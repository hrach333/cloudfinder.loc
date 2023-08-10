<?php

namespace Hrach\Cloudfinder;

abstract class View
{
    abstract protected function  content();
    protected $title;

    public function setTitle($title){
        $this->title = $title;
    }
    private function header()
    {
        if (empty($this->title)){
            $this->title = "CloudFinder";
        }
        echo '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'. $this->title. '</title>
</head>';
    }


    private function footer()
    {
        echo '</body>
            </html>';
    }

    public function html()
    {
        $this->header();
        $this->content();
        $this->footer();
    }
}