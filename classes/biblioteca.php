<?php
declare(strict_types=1);
namespace classes;


use classes\usuario;
use classes\revista;
use classes\livro;

class Biblioteca{
    private $nome;
    private $itens;
    private $usuarios;

    //método construtor exigindo tipos p/ propriedades
    public function __construct(string $nome){
        $this->nome = $nome;
        $this->itens = [];
        $this->usuarios = [];  
        
        echo "Biblioteca ".$this->nome." criada com sucesso.<br>";
    }

    //método para cadastrar usuário
    public function cadastroUsuario(string $nome, string $matricula){
        $usuario = new Usuario($nome, $matricula);
        $this->usuarios[] = $usuario;
        echo "Biblioteca ".$this->nome." cadastrou o usuário ".$nome." nº de matrícula ".$matricula.". <br>";
        return $usuario;
    }

    //método para cadastrar revista
    public function cadastrarRevista(string $titulo, string $autor, int $ano, int $edicao){
            $revista = new Revista($titulo, $autor, $ano, $edicao);
            $this->itens[] = $revista;
            echo "Biblioteca ".$this->nome." cadastrou a revista ".$titulo." edição nº ".$edicao." do autor ".$autor." no seu estoque. <br>";
            return $revista;
    }

    //método para cadastrar livro
    public function cadastrarLivro(string $titulo, string $autor, int $ano, string $isbn){
            $livro = new Livro($titulo, $autor, $ano, $isbn);
            $this->itens[] = $livro;
            echo "Biblioteca ".$this->nome." cadastrou o livro ".$titulo." do autor ".$autor." no seu estoque. <br>";
            return $livro;
    }

    public function emprestarLivro(Usuario $usuario, Livro $livro){
        //verificar disponibilidade deste livro nesta biblioteca
        foreach($this->itens as $index => $item){
            if($item->getTitulo() === $livro->getTitulo() && $item->getAutor() === $livro->getAutor()){
                if(!$item->getDisponibilidade()){
                    echo "Livro ".$livro->getTitulo()." indisponível na bibloteca ".$this->nome.". <br>";
                    return;
                }
                break;
            }
        }

        //passando para o usuario que ele pegou o livro emprestado
        $usuario->setLivroEmprestado($livro);

        //mudando a disponibilidade do livro
        $livro->emprestar();
        echo "Biblioteca " .$this->nome." emprestou o livro ".$livro->getTitulo()." para o usuário ".$usuario->getNome().". <br>";
    }

    public function devolverLivro(Usuario $usuario, Livro $livro){
        //verificar disponibilidade deste livro nesta biblioteca
        foreach($this->itens as $index => $item){
            if($item->getTitulo() === $livro->getTitulo() && $item->getAutor() === $livro->getAutor()){
                if($item->getDisponibilidade()){
                    echo "O livro ".$livro->getTitulo()." não foi emprestado na Biblioteca ".$this->nome.". <br>";
                    return;
                }
                break;
            }
        }

        //tirando do objeto usuario este livro da lista de itens que ele pegou emprestado
        $usuario->unsetLivroEmprestado($livro);
        //mudando a disponibilidade do livro
        $livro->devolver();
        
    }

    //getter retornando todos usuarios cadastrados
    public function getUsuarios(){
        echo "Usuários da Biblioteca ".$this->nome.": <br>";

        foreach($this->usuarios as $usuario){
            echo "Nome: ".$usuario->getNome()." | Matrícula: ".$usuario->getMatricula()."<br>";
        }
    }

    //getter retornando todos itens cadastrados (array objetos)
    public function getDItens(){
        return $this->itens;
    }

    //getter retornando todos itens cadastrados E SEUS DADOS (printando para o usuário)
    public function getDadosItens(){
        echo "Itens da Biblioteca ".$this->nome.": <br>";
        foreach($this->itens as $item){
            $disponibilidade = null;
            if($item instanceof Livro){
                if($item->getDisponibilidade() === true){$disponibilidade = "Disponível";}else{$disponibilidade = "Indisponível";};
                echo "Livro - Título: ".$item->getTitulo()." | Autor: ".$item->getAutor()." | Ano: ".$item->getAno()." | ISBN: ".$item->getIsbn()." | Status: <strong>".$disponibilidade."</strong><br>";
            }
            if($item instanceof Revista){
                echo "Revista - Título: ".$item->getTitulo()." | Autor: ".$item->getAutor()." | Ano: ".$item->getAno()." | Edição: ".$item->getEdicao()."<br>";
            }
        }
    }
}