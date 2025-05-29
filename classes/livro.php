<?php
declare(strict_types=1);
namespace classes;

use classes\itembiblioteca;
use classes\usuario;
use \interfaces\emprestavel;

class Livro extends ItemBiblioteca implements Emprestavel{
    private $isbn;
    public $disponibilidade;

    //método construtor exigindo tipos p/ propriedades
    public function __construct(string $titulo, string $autor, int $ano, string $isbn){
        //herdando construtor da classe abstrata
        parent::__construct($titulo, $autor, $ano);
        $this->isbn = $isbn;
        $this->disponibilidade = true;
        $this->emprestadoPara = null;
    }

    //getter retornando se o livro está disponível
    public function getDisponibilidade(){
        return $this->disponibilidade;
    }

    //setter de disponibilidade
    public function setDisponibilidade(boolval $disponibilidade){
        $this->disponibilidade = $disponibilidade;
    }

    //getter retornando isbn
    public function getIsbn() : string{
        return $this->isbn;
    }
    
    //funcao que empresta o livro obrigatoria da interface emprestavel
    public function emprestar(){
        $this->disponibilidade = false;
    }

    //funcao que devolve o livro emprestado herdada da interface emprestavel
    public function devolver(){
        $this->disponibilidade = true;
    }
}