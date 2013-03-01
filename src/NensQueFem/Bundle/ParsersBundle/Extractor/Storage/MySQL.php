<?php
/**
 * @author Jordi Llonch <llonch.jordi@gmail.com>
 * @date 15/02/13 10:40
 */

namespace NensQueFem\Bundle\ParsersBundle\Extractor\Storage;

use JordiLlonch\Bundle\WebScrapperBundle\Extractor\Storage\Base as BaseStorage;
use NensQueFem\Bundle\CoreBundle\Entity\Activity;

class MySQL extends BaseStorage
{
    public function saveData($id, $name, $data)
    {
        foreach ($data as $item) {
            // check if exists
            $activity = $this->em->getRepository('NensQueFemCoreBundle:Activity')->findOneByExternalId($item['external_id']);
            if(!$activity) $activity = new Activity();

            // save/update data
            $activity->setSourceId($id);
            $activity->setExternalId($item['external_id']);
            $activity->setTitle($item['title']);
            $activity->setDescription($item['description']);
            $activity->setContent($item['content']);
            $activity->setLink($item['link']);
            $activity->setPermalink($item['permalink']);
            $activity->setDate($item['date']);
            $activity->setRecommendedAgeFrom($item['age_from']);
            $activity->setRecommendedAgeTo($item['age_to']);

            $this->em->persist($activity);
            $this->em->flush();
        }
    }
}
