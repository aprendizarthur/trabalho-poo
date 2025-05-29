<?php
declare(strict_types=1);
namespace classes;

class Usuario{
    private $nome;
    private $matricula;
    private $itensEmprestados;

    //método construtor exigindo tipos p/ propriedades
    public function __construct(string $nome, string $matricula){
        $this->nome = $nome;
        $this->matricula = $matricula;
        $this->itensEmprestados = [];
    }

    //setter de livro emprestado
    public function setLivroEmprestado(Livro $livro){
        $this->itensEmprestados[] = $livro;
    }

    //unset de livro que foi devolvido da lista de itensEmprestados
    public function unsetLivroEmprestado(Livro $livro){
        foreach($this->itensEmprestados as $index => $item){
            if($item === $livro){
                unset($this->itensEmprestados[$index]);
                $this->itensEmprestados = array_values($this->itensEmprestados);
            }
            break;
        }
    }

    //getter retornando nome
    public function getNome() : string{
        return $this->nome;
    }

    //getter retornando matricula
    public function getMatricula() : string{
        return $this->matricula;
    }

    //getter retornando itens emprestados
    public function getItensEmprestados(){
        echo "Livros que ".$this->nome." pegou emprestado: <br>";
        foreach($this->itensEmprestados as $livro){
            echo "Título: ".$livro->getTitulo()." | Autor: ".$livro->getAutor()."<br>";
        }
    }
}