<?php
/**
 * @author Jordi Llonch <llonch.jordi@gmail.com>
 * @date 15/02/13 13:54
 */

namespace JordiLlonch\Bundle\WebScrapperBundle\Extractor;

use JordiLlonch\Bundle\WebScrapperBundle\Extractor\Parsers\Base as BaseParsers;
use JordiLlonch\Bundle\WebScrapperBundle\Extractor\Spiders\Base as BaseSpiders;
use JordiLlonch\Bundle\WebScrapperBundle\Extractor\Storage\Base as BaseStorage;

class Source
{
    protected $parser;
    protected $spider;
    protected $storage;

    public function __construct(BaseParsers $parser, BaseSpiders $spider, BaseStorage $storage)
    {
        $spider->setParser($parser);

        $this->parser = $parser;
        $this->spider = $spider;
        $this->storage = $storage;
    }

    public function getId()
    {
        return $this->spider->getId();
    }

    public function getName()
    {
        return $this->spider->getName();
    }

    public function run()
    {
        return $this->spider->run();
    }

    public function saveData($id, $name, $data)
    {
        return $this->storage->saveData($id, $name, $data);
    }
}