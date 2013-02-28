<?php
/**
 * @author Jordi Llonch <llonch.jordi@gmail.com>
 * @date 17/08/12 23:54
 */

namespace JordiLlonch\Bundle\WebScrapperBundle\Extractor;

use JordiLlonch\Bundle\WebScrapperBundle\Extractor\Source;

class Engine
{
    protected $sources = array();

    public function __construct()
    {
    }

    public function setSource(Source $source)
    {
        $this->sources[] = $source;
    }

    public function run($sourceNum = null)
    {
        if ($sourceNum == null) {
            $c = count($this->sources);
            $start = 0;
        } else {
            $start = $sourceNum;
            $c = $start + 1;
        }

        for ($i = $start; $i < $c; $i++) {
            // extract data and parse
            $data = $this->sources[$i]->run();

            // store data
            $this->sources[$i]->saveData($this->sources[$i]->getId(), $this->sources[$i]->getName(), $data);
        }
    }
}
