<?php
declare(strict_types=1);
namespace interfaces;

//interface que vai obrigar todos os itens emprestaveis a ter determinados métodos
interface Emprestavel{
    public function emprestar();
    public function devolver();
}