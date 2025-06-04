**AVALIADO 81/100**

Desenvolva um sistema em PHP orientado a objetos para gerenciar uma biblioteca universitária, utilizando o Composer para gerenciar dependências e autoload de classes e interfaces. O sistema deve implementar os conceitos de propriedades, métodos, construtores, herança, relacionamentos, strict types, interfaces, encapsulamento e getters, conforme especificado abaixo:

1. **Classes e Relacionamentos**:
   - Crie uma classe abstrata `ItemBiblioteca` com propriedades protegidas para `titulo` (string), `autor` (string) e `anoPublicacao` (int). Inclua um construtor para inicializar essas propriedades e métodos getters para acessá-las.
   - Implemente uma interface `Emprestavel` com os métodos `emprestar()` e `devolver()`, que devem ser implementados por classes que representem itens que podem ser emprestados.
   - Crie as classes `Livro` e `Revista`, que herdam de `ItemBiblioteca`. A classe `Livro` deve implementar a interface `Emprestavel` e ter uma propriedade privada `isbn` (string) com getter. A classe `Revista` não será emprestável e deve ter uma propriedade privada `edicao` (int) com getter.
   - Crie uma classe `Usuario` com propriedades privadas `nome` (string) e `matricula` (string), um construtor para inicializá-las e getters. Esta classe deve manter uma lista de itens emprestados (relacionamento 1:N com `Livro`).

2. **Regras de Negócio**:
   - Utilize *strict types* (`declare(strict_types=1);`) em todos os arquivos PHP.
   - A classe `Livro` deve ter um método `emprestar()` que verifica se o livro está disponível (propriedade booleana `disponivel`) antes de permitir o empréstimo. O método `devolver()` deve liberar o livro.
   - Encapsule todas as propriedades usando modificadores de acesso apropriados (`private` ou `protected`) e forneça getters para acessar os valores.
   - Implemente um método na classe `Usuario` para adicionar um livro à lista de empréstimos, verificando se o livro está disponível antes de associá-lo.

3. **Requisitos Técnicos**:
   - Crie uma classe `Biblioteca` que gerencie uma coleção de itens (`Livro` e `Revista`) e usuários. Esta classe deve ter métodos para:
     - Adicionar itens à coleção.
     - Registrar usuários.
     - Realizar o empréstimo de um livro para um usuário, utilizando os métodos da interface `Emprestavel`.
     - Exibir uma lista de todos os itens e seus detalhes (título, autor, ano, ISBN ou edição, e disponibilidade, se aplicável).
   - Todas as classes e interfaces devem estar em arquivos separados, com uma estrutura de diretórios organizada (ex.: `src/Models`, `src/Interfaces`).
   - Utilize o **Composer** para gerenciar o projeto, configurando o autoload no arquivo `composer.json` para carregar automaticamente todas as classes e interfaces. Inclua o arquivo de autoload (`vendor/autoload.php`) no arquivo principal.

4. **Entrega**:
   - Forneça o código-fonte completo, incluindo o arquivo `composer.json` configurado para autoload das classes e interfaces, com comentários explicando o uso de cada conceito (propriedades, métodos, construtores, herança, relacionamentos, strict types, interfaces, encapsulamento e getters).
   - Inclua um arquivo principal (`index.php`) que demonstre o funcionamento do sistema, criando instâncias de `Livro`, `Revista`, `Usuario`, e simulando operações de empréstimo e devolução.
   - O código deve be funcional, com tipagem estrita, autoload via Composer e sem erros de execução.

**Avaliação**:
- Corretude na implementação dos conceitos de orientação a objetos (45%).
- Uso adequado de *strict types*, encapsulamento, interfaces e Composer com autoload (35%).
- Organização do código, clareza dos comentários e estrutura do projeto (20%).
