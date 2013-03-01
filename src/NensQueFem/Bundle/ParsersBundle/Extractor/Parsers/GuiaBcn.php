<?php
/**
 * @author Jordi Llonch <llonch.jordi@gmail.com>
 * @date 30/08/12 16:11
 */

namespace NensQueFem\Bundle\ParsersBundle\Extractor\Parsers;

use JordiLlonch\Bundle\WebScrapperBundle\Extractor\Parsers\Base;

class GuiaBcn extends Base
{
    public function run(array $rawData)
    {
        $result = array();

        foreach ($rawData as $item) {
            $activity = array();
            $activity['external_id'] = htmlspecialchars_decode($item->get_id());
            $activity['title'] = html_entity_decode(htmlspecialchars_decode($item->get_title()), null, 'UTF-8');;
            $activity['description'] = html_entity_decode(htmlspecialchars_decode($item->get_description()), null, 'UTF-8');;
            $activity['content'] = htmlspecialchars_decode($item->get_content());
            $activity['link'] = htmlspecialchars_decode($item->get_link());
            $activity['permalink'] = htmlspecialchars_decode($item->get_permalink());
            $activity['date'] = null; // TODO
            $activity['age_from'] = null; // TODO
            $activity['age_to'] = null; // TODO

//            echo $activity['title'] . "\n";

            $result[] = $activity;
        }

        return $result;
    }
}
