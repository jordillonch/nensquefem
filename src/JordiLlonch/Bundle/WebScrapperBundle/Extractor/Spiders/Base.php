<?php
/**
 * @author Jordi Llonch <llonch.jordi@gmail.com>
 * @date 29/08/12 19:42
 */

namespace JordiLlonch\Bundle\WebScrapperBundle\Extractor\Spiders;

use JordiLlonch\Bundle\WebScrapperBundle\Extractor\Parsers\Base as BaseParser;

abstract class Base
{
    protected $parser;

    public function __construct()
    {
    }

    public function setParser(BaseParser $parser)
    {
        $this->parser = $parser;
    }

    abstract public function run();

    abstract public function getId();

    abstract public function getName();
}