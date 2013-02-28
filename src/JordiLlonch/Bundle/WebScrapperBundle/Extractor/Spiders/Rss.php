<?php
/**
 * @author Jordi Llonch <llonch.jordi@gmail.com>
 * @date 17/08/12 23:34
 */

namespace JordiLlonch\Bundle\WebScrapperBundle\Extractor\Spiders;

use JordiLlonch\Bundle\WebScrapperBundle\Extractor\Parsers\Base as BaseParser;

abstract class Rss extends Base
{
    protected $feed;

    public function __construct()
    {
        parent::__construct();

        $this->feed = new \SimplePie();
        $this->feed->enable_cache(false);
    }
}
