<?php
declare(strict_types=1);
namespace classes;

//classe abstrata que vai passar propriedades e métodos para tudo o que for item da bilioteca
abstract class ItemBiblioteca{
    protected $titulo;
    protected $autor;
    protected $ano;

    //método construtor exigindo tipos p/ propriedades
    public function __construct(string $titulo, string $autor, int $ano){
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->ano = $ano;
    }

    //getter retornando titulo
    public function getTitulo(): string {
        return $this->titulo;
    }

    //getter retornando autor
    public function getAutor(): string {
        return $this->autor;
    }

    //getter retornando ano
    public function getAno(): int {
        return $this->ano;
    }
}