<?php
namespace Jampot5000\Calibre;

use Jampot5000\Calibre\Models\Author;

/**
 * Class CalibreInterface
 * @package Jampot5000\Calibre
 * Used to access the models and provide helper methods
 */
class CalibreInterface
{
    private $config;

    /**
     * Constructor
     * @param $config Array of calibre configuration values.
     */
    public function __construct($config)
    {
        $this->config =$config;
    }
}
