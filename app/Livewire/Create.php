<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Create extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_verify = '';

    public function save()
    {
       // Validação dos campos do formulário de cadastro.
        $this->validate(
        [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'password_verify' => 'required|same:password',
        ],
        [
            'name.required' => 'Preencha o campo Nome.',
            'email.required' => 'Preencha o campo Email.',
            'password.required' => 'Preencha o campo Senha.',
            'password_verify.required' => 'Preencha o campo Confirmar Senha.',
            'email' => 'Preencha um e-mail válido.',
            'email.unique' => 'Email já cadastrado.',
            'password_verify.same' => 'As senhas não coincidem.',
        ]);
        
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => md5($this->password)
        ]);

        // Adiciona na variável 'mensagem' de sessão o retorno do cadastro
        session()->flash('mensagem', 'Usuário cadastrado com sucesso');
        // Adiciona na variável 'type' o tipo do alerta.
        session()->flash('type', 'success');
    
        return redirect()->route('grid');
    }

    // Método de retorno para a tela inicial com grid.
    public function grid()
    {
        return redirect()->route('grid');
    }

    // Método principal do formulário de cadastro.
    public function render()
    {
        return view('livewire.create');
    }
}
