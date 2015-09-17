<?php
namespace TuanQuynh\BusinessBundle\Repository;

use TuanQuynh\BusinessBundle\Repository\BaseRepository;
use TuanQuynh\BusinessBundle\Lib\TQPaginator;

class PageHtmlRepository extends BaseRepository
{
    public function getAllByPaginator($keyword = '')
    {
        $dql = $this->getRepository()->createQueryBuilder('PH')
        //->select('PH.*')
        // ->where('LOWER(SA.originName) = :originName')
        // ->andWhere("DATE_FORMAT(SA.measureDate,'%Y%m') = :measureDate")
        // ->setParameter('originName', $search['origin'])
        // ->setParameter('measureDate', $search['month'])
        ->orderBy('PH.createdAt', 'DESC')
        ->getQuery();

        return new TQPaginator($dql);
    }
}
