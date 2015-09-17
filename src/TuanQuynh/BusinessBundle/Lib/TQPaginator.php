<?php
namespace TuanQuynh\BusinessBundle\Lib;

use Doctrine\ORM\Tools\Pagination\Paginator;

class TQPaginator extends Paginator
{
    protected $page;
    protected $limit;
    protected $maxPage;
    protected $totalRecord;
    protected $totalRecordReturned;
    protected $container;

    public function __construct($dql, $page = 1, $limit = 15)
    {
        parent::__construct($dql);

        $this->setPageAndLimit($page, $limit);

        //Set limit
        $this->getQuery()
            ->setFirstResult($this->limit * ($this->page - 1))
            ->setMaxResults($this->limit);

        //Calculate
        $this->totalRecordReturned = $this->getIterator()->count();
        $this->totalRecord = $this->count();
        $this->maxPage = ceil($this->totalRecord / $this->limit);
    }

    public function renderLinks()
    {
        if($this->maxPage <= 1) {
            return '';
        }

        $first = 1;
        $prev = ($this->page-1>0)?$this->page-1:1;
        $next = ($this->page+1<$this->maxPage)?$this->page+1:$this->maxPage;
        $last = $this->maxPage;
        $start = ($this->page-1) * $this->limit;
        $end  = $start + $this->totalRecordReturned;

        $classPrev = '';
        if($this->page <= 1) {
            $classPrev = 'disabled';
        }
        $classNext = '';
        if($this->page >= $this->maxPage) {
            $classNext = 'disabled';
        }

        $request = $this->container->get('request');
        $currentRoute = $request->get('_route');
        $router = $this->container->get('router');

        $links = '<div class="row">';
        $links .=    '<div class="col-lg-6">';
        $links .=    '        Showing '.($start + 1).' to '.$end.' of '.$this->totalRecord.' entries';
        $links .=    '    </div>';
        $links .=    '    <div class="col-lg-6">';
        $links .=    '        <ul class="pagination pull-right" style="margin: 0px;">';
        $links .=    '            <li class="paginate_button previous '.$classPrev.'" aria-controls="DataTables_Table_0" tabindex="0" id="DataTables_Table_0_first"><a href="'.$router->generate($currentRoute, array('page' => $first)).'" class="'.$classPrev.'"><i class="fa fa-fast-backward"></i></a></li>';
        $links .=    '            <li class="paginate_button previous '.$classPrev.'" aria-controls="DataTables_Table_0" tabindex="0" id="DataTables_Table_0_previous"><a href="'.$router->generate($currentRoute, array('page' => $prev)).'" class="'.$classPrev.'"><i class="fa fa-backward"></i></a></li>';

        for($i=1; $i<=$this->maxPage; $i++) {
            if($i === $this->page) {
                $links .=    '            <li class="paginate_button active" aria-controls="DataTables_Table_0" tabindex="0"><a href="#">'.$i.'</a></li>';
            } else {
                $links .=    '            <li class="paginate_button" aria-controls="DataTables_Table_0" tabindex="0"><a href="'.$router->generate($currentRoute, array('page' => $i)).'">'.$i.'</a></li>';
            }
        }

        $links .=    '            <li class="paginate_button next '.$classNext.'" aria-controls="DataTables_Table_0" tabindex="0" id="DataTables_Table_0_next"><a href="'.$router->generate($currentRoute, array('page' => $next)).'" class="'.$classNext.'"><i class="fa fa-forward"></i></a></li>';
        $links .=    '            <li class="paginate_button next '.$classNext.'" aria-controls="DataTables_Table_0" tabindex="0" id="DataTables_Table_0_last"><a href="'.$router->generate($currentRoute, array('page' => $last)).'" class="'.$classNext.'"><i class="fa fa-fast-forward"></i></a></li>';
        $links .=    '        </ul>';
        $links .=    '    </div>';
        $links .=    '</div>';

        return $links;
    }

    public function setContainer($container)
    {
        $this->container = $container;
    }

    private function setPageAndLimit($page = 1, $limit = 10)
    {
        $this->page = intval($page);
        $this->limit = intval($limit);

        if(array_key_exists('page', $_GET)) {
            $this->page = intval($_GET['page']);
        }

        if(array_key_exists('limit', $_GET)) {
            $this->limit = intval($_GET['limit']);
        }
    }

}
