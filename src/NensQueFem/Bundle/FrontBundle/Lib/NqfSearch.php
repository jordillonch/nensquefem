<?php
/**
 * User: magi2c
 */

namespace NensQueFem\Bundle\FrontBundle\Lib;

use NensQueFem\Bundle\FrontBundle\Lib\NqfSearchMongo;

class NqfSearch
{
    protected $handler;
    protected $limit_page;

    function __construct($handler_class)
    {
        $this->limit_page = 20;
        if($handler_class == 'NqfSearchMongo')
            $this->handler = new NqfSearchMongo();
        else
            throw new exception('Error handler class');
    }

    /**
     * @param $params_arr
     * @return array
     */
    public function getResult($params_arr)
    {
       $result = array();
       for($i = 0; $i < 20; $i++)
       {
           $result[] = array('title'        => 'title'.$i,
                             'description'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nisi massa, iaculis in varius eget, porta eget nisl. Praesent dignissim lobortis varius. Aliquam felis velit, tincidunt ut lacinia sit amet, lobortis vel arcu. Praesent tellus nisl, adipiscing ac fringilla at, imperdiet non urna. Suspendisse id leo non eros pretium sollicitudin. Phasellus mattis suscipit iaculis.',
                             'link'         => 'link'.$i,
                             'category_arr' => array('animacio' => 'Animació', 'cinema' => 'Cinema'),
                             'city_arr'     => array('barcelona' => 'Barcelona'), //slug => description
                             'date_arr'     => array('06-09-12'),
                             'years_arr'     => array('0-3','3-6')
           );
       }

       $total = array(
           'category_arr' => array('animacio' => 'Animació', 'cinema' => 'Cinema'),
           'city_arr'     => array('barcelona' => 'Barcelona'), //slug => description
           'date_arr'     => array('06-09-12'),
           'years_arr'     => array('0-3','3-6')
           );


       $paginator = array(  'limit_page'    => $this->limit_page,
                            'total'         => 100);


       return array('result_arr' => $result, 'total_arr' => $total, 'paginator_arr' => $paginator);
    }

}
