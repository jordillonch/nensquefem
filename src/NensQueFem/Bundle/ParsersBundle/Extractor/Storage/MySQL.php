<?php
/**
 * @author Jordi Llonch <llonch.jordi@gmail.com>
 * @date 15/02/13 10:40
 */

namespace NensQueFem\Bundle\ParsersBundle\Extractor\Storage;

use JordiLlonch\Bundle\WebScrapperBundle\Extractor\Storage\Base as BaseStorage;

class MySQL extends BaseStorage
{
    public function saveData($id, $name, $data)
    {
        foreach ($data as $item) {
            echo 'id: ' . htmlspecialchars_decode($item->get_id()) . "\n";
            echo 'title: ' . html_entity_decode(htmlspecialchars_decode($item->get_title()), null, 'UTF-8') . "\n";
            echo 'description: ' . html_entity_decode(
                htmlspecialchars_decode($item->get_description()),
                null,
                'UTF-8'
            ) . "\n";
            echo 'content: ' . htmlspecialchars_decode($item->get_content()) . "\n";
            echo 'link: ' . htmlspecialchars_decode($item->get_link()) . "\n";
            echo 'permalink: ' . htmlspecialchars_decode($item->get_permalink()) . "\n";
        }
    }
}
