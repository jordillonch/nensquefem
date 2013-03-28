<?php
/**
 * @author Jordi Llonch <llonch.jordi@gmail.com>
 * @date 30/08/12 16:11
 */

namespace NensQueFem\Bundle\ParsersBundle\Extractor\Parsers;

use Doctrine\ORM\EntityManager;
use JordiLlonch\Bundle\WebScrapperBundle\Extractor\Parsers\Base;
use NensQueFem\Bundle\CoreBundle\Entity\City;

class GuiaBcn extends Base
{
    protected $em;
    protected $categories;

    public function setEntityManager(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function run(array $rawData)
    {
//        ladybug_dump($rawData);
        $result = array();

        foreach ($rawData as $item) {
            $itemFeedData = $item['feed_data'];
            $activity = array();
            $activity['city'] = $this->getCity($item);
            $activity['category'] = $this->getCategory($item);
            $activity['external_id'] = htmlspecialchars_decode($itemFeedData->get_id());
            $activity['title'] = html_entity_decode(htmlspecialchars_decode($itemFeedData->get_title()), null, 'UTF-8');
            $activity['description'] = html_entity_decode(htmlspecialchars_decode($itemFeedData->get_description()), null, 'UTF-8');
            $activity['content'] = htmlspecialchars_decode($itemFeedData->get_content());
            $activity['link'] = htmlspecialchars_decode($itemFeedData->get_link());
            $activity['permalink'] = htmlspecialchars_decode($itemFeedData->get_permalink());
            $activity['date'] = $this->getDate($item);
            $ages = $this->getAges($item);
            $activity['age_from'] = $ages['from'];
            $activity['age_to'] = $ages['to'];

//            echo $activity['title'] . "\n";

            $result[] = $activity;
        }

        return $result;
    }

    protected function getCity($item)
    {
        return $this->em->getReference('NensQueFemCoreBundle:City', City::$BARCELONA);
    }

    protected function getCategory($item)
    {
        // get categories (cached)
        if(empty($this->categories)) {
            $catItems = $this->em->getRepository('NensQueFemCoreBundle:Category')->findAll();

            $this->categories = array();
            foreach ($catItems as $catItem) {
                $keyWords = explode(',', $catItem->getKeyWords());
                $category = array();
                $category['obj'] = $catItem;
                $category['keywords'] = $keyWords;
                $this->categories[] = $category;
            }
        }

        // match with title
        $content = html_entity_decode(htmlspecialchars_decode($item['feed_data']->get_title()), null, 'UTF-8');
        $categoryResult = $this->matchCategory($content);
        if($categoryResult) return $categoryResult;

        // match with description
        $content = html_entity_decode(htmlspecialchars_decode($item['feed_data']->get_description()), null, 'UTF-8');
        $categoryResult = $this->matchCategory($content);
        if($categoryResult) return $categoryResult;

//        // match with link web content
//        $categoryResult = $this->matchCategory($item['link_web_content']);
//        if($categoryResult) return $categoryResult;

        return null;
    }

    /**
     * @param $item
     * @return array
     */
    protected function matchCategory($content)
    {
        $categoryResult = null;
        foreach ($this->categories as $category) {
            foreach ($category['keywords'] as $keyword) {
                if (preg_match('/\b' . $keyword . '\b/i', $content, $matches)) {
                    $categoryResult = $category['obj'];
//                    echo "$keyword == $content\n";
                }
            }
        }

        return $categoryResult;
    }

    protected function getDate($item)
    {
        $date = null;
        if (preg_match('/(..)\/(..)\/(....)<\/dd>/', $item['link_web_content'], $matches))
        {
//            ladybug_dump($matches);
            $date = new \DateTime($matches[3] . '-' . $matches[2] . '-' . $matches[1]);
        }

        return $date;
    }
    protected function getAges($item)
    {
        // TODO
    }
}
