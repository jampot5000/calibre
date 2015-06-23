<?php

namespace Jampot5000\Calibre;


use Jampot5000\Calibre\Models\Author;

class CalibreInterface {

    private $config;

    public function __construct($config)
    {
        $this->config =$config;
    }





}