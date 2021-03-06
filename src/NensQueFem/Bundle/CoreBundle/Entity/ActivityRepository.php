<?php

namespace NensQueFem\Bundle\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ActivityRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ActivityRepository extends EntityRepository
{
    public function search($filters)
    {
        $query = $this->searchQueryBuilder($filters);
        $result = $query->getQuery()->getResult();
//        ladybug_dump($result);

        return $result;
    }

    public function searchQueryBuilder($filters)
    {
//        ladybug_dump($filters);
        $query = $this->createQueryBuilder('a');

        // category
        $categories = $filters['category']->getValues();
        if(!empty($categories)) {
            $query->andWhere('a.category IN(:category)')
                ->setParameter('category', $categories);
        }

        // city
        $cities = $filters['city']->getValues();
        if(!empty($cities)) {
            $query->andWhere('a.city IN(:city)')
                ->setParameter('city', $cities);
        }

        // dates
        if(!empty($filters['date_from'])) {
            $query->andWhere('a.date >= :date_from')
                ->setParameter('date_from', $filters['date_from']);
        }
        if(!empty($filters['date_to'])) {
            $query->andWhere('a.date <= :date_to')
                ->setParameter('date_to', $filters['date_to']->format('Y-m-d 23:59:59'));
        }

        // years
        if(!empty($filters['years'])) {
            $ages = array();
            foreach ($filters['years'] as $years) {
                list($age_from, $age_to) = explode('-', $years);
                $ages[] = '(a.recommendedAgeFrom >= ' . $age_from . ' AND a.recommendedAgeTo <= ' . $age_to . ')';
            }
            $query->andWhere(implode(' OR ', $ages));
        }

        return $query;
    }
}
