<?php
/**
 * @author Jordi Llonch <llonch.jordi@gmail.com>
 * @date 04/03/13 14:21
 */

namespace NensQueFem\Bundle\CoreBundle\Services;

use Doctrine\ORM\EntityManager;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;

class Search
{
    protected $em;
    protected $limit_page;

    function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
        $this->limit_page = 20;
    }

    /**
     * @param $params_arr
     * @return array
     */
    public function getResultPager($filters, $currentPage=1)
    {
//        $result = $this->em->getRepository('NensQueFemCoreBundle:Activity')->search($filters);
//        $total = count($result);
//        $paginator = array('limit_page' => $this->limit_page, 'total' => 100);

        $queryBuilder = $this->em->getRepository('NensQueFemCoreBundle:Activity')->searchQueryBuilder($filters);
        $adapter = new DoctrineORMAdapter($queryBuilder);
        $pagerfanta = new Pagerfanta($adapter);
        $pagerfanta->setMaxPerPage($this->limit_page);
        $pagerfanta->setCurrentPage($currentPage);

        return $pagerfanta;

//        $result = array();
//        for($i = 0; $i < 20; $i++)
//        {
//            $result[] = array('title'        => 'title'.$i,
//                'description'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nisi massa, iaculis in varius eget, porta eget nisl. Praesent dignissim lobortis varius. Aliquam felis velit, tincidunt ut lacinia sit amet, lobortis vel arcu. Praesent tellus nisl, adipiscing ac fringilla at, imperdiet non urna. Suspendisse id leo non eros pretium sollicitudin. Phasellus mattis suscipit iaculis.',
//                'link'         => 'link'.$i,
//                'category' => array('animacio' => 'Animació', 'cinema' => 'Cinema'),
//                'city'     => array('barcelona' => 'Barcelona'), //slug => description
//                'date'     => array('06-09-12'),
//                'years'     => array('0-3','3-6')
//            );
//        }
//
//        $total = array(
//            'category' => array('animacio' => 'Animació', 'cinema' => 'Cinema'),
//            'city'     => array('barcelona' => 'Barcelona'), //slug => description
//            'date'     => array('06-09-12'),
//            'years'     => array('0-3','3-6')
//        );
//
//
//        $paginator = array(  'limit_page'    => $this->limit_page,
//            'total'         => 100);
//
//
//        return array('result' => $result, 'total' => $total, 'paginator' => $paginator);
    }
}