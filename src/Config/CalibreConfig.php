<?php
/**
 * Created by PhpStorm.
 * User: emi
 * Date: 25/06/2015
 * Time: 11:34
 */

namespace Jampot5000\Calibre\Config;

interface CalibreConfig
{
    public function boot();
    public function getAuthorRepository();
    public function getBookRepository();
    public function getSeriesRepository();
}
