## Cadastro de Usuários - Livewire

O projeto tem como objetivo principal o aprendizado da biblioteca Livewire em uma aplicação. O projeto consiste em um CRUD de usuários.

## Estrutura do projeto

O projeto está construindo separado em três componentes do livewire.

-`App\Livewire\Grid`: Vai fazer o controle da tela inicial, com o grid dos usuários e o filtro de busca.

-`App\Livewire\Create`: Vai fazer o controle da tela de cadastro dos usuários.

-`App\Livewire\Update`:  Vai fazer o controle da tela de atualização dos usuários.

Cada controlador vai ter sua respectiva view dentro do caminho: `\resources\views\livewire`

## Como inciar

É necessário está na versão 8.2 do PHP.

Rodar o comando abaixo para iniciar o servidor:
```sh
php artisan serve
```
