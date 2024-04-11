<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Update extends Component
{

    public $name;
    public $email;
    public $password;
    public $password_verify;

    public function save($id)
    {

        // Validação dos campos do formulário de atualização.
        $this->validate(
        [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password_verify' => 'same:password',
        ],
        [
            'name.required' => 'Preencha o campo Nome.',
            'email.required' => 'Preencha o campo Email.',
            'password.required' => 'Preencha o campo Senha.',
            'password_verify.required' => 'Preencha o campo Confirmar Senha.',
            'email' => 'Preencha um e-mail válido.',
            'unique' => 'Email já cadastrado.',
            'password_verify.same' => 'As senhas não coincidem.',
        ]);

        $user = User::find($id);
        
        $user->name = $this->name;
        $user->email = $this->email;

        // Atualiza a senha para codificar no padrão de md5.
        if($this->password){
            $user->password = md5($this->password);
        }

        $user->save();

        // Adiciona na variável 'mensagem' de sessão o retorno do cadastro
        session()->flash('mensagem', 'Usuário atualizado com sucesso');
        // Adiciona na variável 'type' o tipo do alerta.
        session()->flash('type', 'success');
            
        return redirect()->route('grid');
        
    }

    // Método de retorno para a tela inicial com grid.
    public function grid()
    {
        return redirect()->route('grid');
    }

    //Para permitir o redirecionamento, caso não haja o id, precisa ser mount.
    public function mount()
    {
    
        // Verifica sem tem o id do registro, se não houver, retorna para a tela principal.
        if(empty(session('id'))){
            return redirect()->route('grid');
        }

        $user = User::find(session('id'));
        
        // Atribui os valores retornados para as respectivas variáveis do campos do formulário.
        $this->name = $user->name;
        $this->email = $user->email;
        
        return view('livewire.update');
    }
}
