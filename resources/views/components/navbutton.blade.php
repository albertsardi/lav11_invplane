<div class="headerbar-item pull-right visible-lg">
        @php
            $curPage=2;
            $prevPage=$curPage-1;
            $nextPage=$curPage+1;
            $lastPage=10;
        @endphp
        <div class="model-pager btn-group btn-group-sm">
            <a class="btn btn-default " href="http://localhost/lav7_invplane/clients/list?page=0" title="First"><i class="fa fa-fast-backward no-margin"></i></a>
            <a class="btn btn-default " href="http://localhost/lav7_invplane/clients/list?page={{$prevPage}}" title="Prev"><i class="fa fa-backward no-margin"></i></a>
            <a class="btn btn-default " href="http://localhost/lav7_invplane/clients/list?page={{$nextPage}}" title="Next"><i class="fa fa-forward no-margin"></i></a>
            <a class="btn btn-default " href="http://localhost/lav7_invplane/clients/list?page={{$lastPage}}" title="Last"><i class="fa fa-fast-forward no-margin"></i></a>
        </div>    
</div>
