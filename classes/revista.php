<?php
declare(strict_types=1);
namespace classes;

use classes\itembiblioteca;

class Revista extends ItemBiblioteca{
    private $edicao;

    //método construtor exigindo tipos p/ propriedades
    public function __construct(string $titulo, string $autor, int $ano, int $edicao){
        //herdando construtor da classe abstrata
        parent::__construct($titulo, $autor, $ano);
        $this->edicao = $edicao;
    }

    //getter retornando edicao
    public function getEdicao() : int{
        return $this->edicao;
    }
}