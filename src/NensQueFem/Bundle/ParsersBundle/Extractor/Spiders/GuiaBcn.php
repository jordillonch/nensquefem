<?php
/**
 * @author Jordi Llonch <llonch.jordi@gmail.com>
 * @date 30/08/12 16:11
 */

namespace NensQueFem\Bundle\ParsersBundle\Extractor\Spiders;

use JordiLlonch\Bundle\WebScrapperBundle\Extractor\Spiders\Rss;

class GuiaBcn extends Rss
{
    public function run()
    {
        $this->feed->set_feed_url('http://guia.bcn.cat/rss/nens-i-nenes,-actes-per-a');
        $this->feed->init();
        $data = $this->feed->get_items();

        $result = array();
        foreach ($data as $k => $item) {
            // get content from url
            $link = htmlspecialchars_decode($item->get_link());
            $link_web_content = file_get_contents($link);

            $r = array();
            $r['feed_data'] = $item;
            $r['link_web_content'] = $link_web_content;
            $result[] = $r;
        }

        return $result;
    }

    public function getId()
    {
        return 1;
    }

    public function getName()
    {
        return 'Guia Barcelona';
    }
}
