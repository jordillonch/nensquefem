<?php
/**
 * @author Jordi Llonch <llonch.jordi@gmail.com>
 * @date 15/02/13 10:14
 */
namespace JordiLlonch\Bundle\WebScrapperBundle\Extractor\Storage;

abstract class Base
{
    abstract public function saveData($id, $name, $data);
}
