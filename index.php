<?php
declare(strict_types=1);
include("vendor/autoload.php");

use classes\biblioteca;
use classes\usuario;

//criando biblioteca(s)
$bibliotecaSaraiva = new Biblioteca("Saraiva");

//criando usuario(s)
$usuarioArthur = $bibliotecaSaraiva->cadastroUsuario("Arthur", "123456");
$usuarioJoao = $bibliotecaSaraiva->cadastroUsuario("Joao", "123452");

//verificando usuário(s) cadastrados
$bibliotecaSaraiva->getUsuarios();

//cadastrando revista(s) e livro(s)
$revistaCiencia = $bibliotecaSaraiva->cadastrarRevista("Ciência Mensal", "Kleber Souza", 2025, 12);
$livroMotivacao1 = $bibliotecaSaraiva->cadastrarLivro("Motivação Real", "Jorge Marim", 2023, "02830-2012940-21");
$livroEducacional1 = $bibliotecaSaraiva->cadastrarLivro("Matemática 9º Ano", "Marcus Rocha", 2011, "02832-2012940-21");

//verificando itens cadastrados
$bibliotecaSaraiva->getDadosItens();

//usuário(s) pegando livro emprestado
$bibliotecaSaraiva->emprestarLivro($usuarioArthur, $livroEducacional1);

//verificando itens cadastrados
$bibliotecaSaraiva->getDadosItens();

//tentando pegar emprestado um livro indisponível
$bibliotecaSaraiva->devolverLivro($usuarioArthur, $livroMotivacao1); //tentando devolver livro não emprestado
$bibliotecaSaraiva->emprestarLivro($usuarioJoao, $livroMotivacao1);
$bibliotecaSaraiva->devolverLivro($usuarioJoao, $livroMotivacao1);

//vendo que livros cada usuário pegou emprestado
$usuarioJoao->getItensEmprestados();
$usuarioArthur->getItensEmprestados();

//verificando itens cadastrados
$bibliotecaSaraiva->getDadosItens();

