<?php
namespace Jampot5000\Calibre;

use Jampot5000\Calibre\Config\CalibreConfig;

/**
 * Class CalibreInterface
 * @package Jampot5000\Calibre
 * Used to access the models and provide helper methods
 */
class CalibreInterface
{
    private $config;
    private $authorRepository;
    private $bookRepository;

    public function __construct(CalibreConfig $config)
    {
        $this->config = $config;

        $this->config->boot();

        $this->authorRepository = $this->config->getAuthorRepository();
        $this->bookRepository   = $this->config->getBookRepository();
    }

    /**
     * @return mixed
     */
    public function getAuthorRepository()
    {
        return $this->authorRepository;
    }

    /**
     * @return mixed
     */
    public function getBookRepository()
    {
        return $this->bookRepository;
    }
}
