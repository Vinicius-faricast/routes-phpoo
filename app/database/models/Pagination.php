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

        private function calculations(){

            $this->currentPage = $_GET['page'] ?? 1;

            $offset = ($this->currentPage-1) * $this->itensPerPage;

            $this->totalPages = ceil($this->totalItens / $this->itensPerPage);

            return "limit $this->itensPerPage offset $offset";
        }

        public function dump(){
            
            return $this->calculations();
        }
    }


?>