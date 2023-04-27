<?php 

    namespace app\database;

    use Mpdf\Tag\Th;

    class Pagination{

        private int $currentPage = 1;
        private int $totalPages;
        private int $linkPerPage = 5;
        private int $itensPerPage = 10;
        private int $totalItens;
        private string $pageIdentifier = 'page';

        public function setTotalItens(int $totalItens){

            $this->totalItens = $totalItens;
        }

        public function setPageIdentifier(string $identifier){

            $this->pageIdentifier = $identifier;
        }

        public function setItensPerPage(int $itensPerPage){

            $this->itensPerPage = $itensPerPage;
        }

        public function getTotal(){
            return $this->totalItens;
        }

        private function calculations(){

            $this->currentPage = $_GET["page"] ?? 1;

            $offset = ($this->currentPage-1) * $this->itensPerPage;

            $this->totalPages = ceil($this->totalItens / $this->itensPerPage);

            return "limit $this->itensPerPage offset $offset";
        }

        public function dump(){
            
            return $this->calculations();
        }

        public function links(){
            $links = "<ul class='pagination'>";

            if($this->currentPage > 1){
                $previous = $this->currentPage - 1;
                $linkPage = http_build_query(array_merge($_GET, [$this->pageIdentifier=>$previous]));
                $first = http_build_query(array_merge($_GET, [$this->pageIdentifier=>1]));
                $links .= "<li class='page-item'><a href = '?{$linkPage}' class='page-link'>Anterior</a></li>";
                $links .= "<li class='page-item'><a href = '?{$first}' class='page-link'>Primeira</a></li>";
            }

            for ($i = $this->currentPage - $this->linkPerPage; $i <= $this->currentPage + $this->linkPerPage; $i++) { 
                if($i > 0 && $this->totalPages){
                    $class = $this->currentPage == $i ? 'active' : '';
                    $linkPage = http_build_query(array_merge($_GET, [$this->pageIdentifier=> $i]));
                    $links .= "<li class = 'page-item {$class}'><a href='?{$linkPage}' class='page-link'>{$i}</a></li>";
                }
           }

            if($this->currentPage < $this->totalPages){
                $next = $this->currentPage + 1;
                $linkPage = http_build_query(array_merge($_GET, [$this->pageIdentifier=>$next]));
                $last = http_build_query(array_merge($_GET, [$this->pageIdentifier=>$this->totalPages]));
                $links .= "<li class='page-item'><a href = '?{$linkPage}' class='page-link'>Próxima</a></li>";
                $links .= "<li class='page-item'><a href = '?{$last}' class='page-link'>Última</a></li>";
            }

            $links .= '</ul>';

            return $links;
        }
    }


?>