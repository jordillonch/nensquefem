<?php
/**
 * @author Jordi Llonch <llonch.jordi@gmail.com>
 * @date 02/09/12 21:44
 */

namespace NensQueFem\Bundle\CoreBundle\Extractor\Spiders;

use JordiLlonch\Bundle\WebScrapperBundle\Extractor\Spiders\Web;

class Diba extends Web
{
    public function run()
    {
        return array();
    }

    public function getId()
    {
        return 2;
    }

    public function getName()
    {
        return 'Diputació de Barcelona';
    }
}
