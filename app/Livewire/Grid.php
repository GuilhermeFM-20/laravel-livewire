<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Grid extends Component
{
    public $filter;
    public $users;

    //Método para redirecionar para o formulário de cadastro.
    public function create(){
        return redirect()->route('create');
    }

    //Método para redirecionar para o formulário de atualização.
    public function update($id){
        return redirect()->route('update')->with('id',$id);
    }

    //Método para excluir o registro.
    public function delete($id){
        User::findOrFail($id)->delete();
    }

    public function search(){
        //Permite buscar por nome e e-mail.
        $this->users = User::where('name','like',"%".$this->filter."%")
                       ->orWhere('email','like',"%".$this->filter."%")
                       ->get();
    }

    public function render()
    {
        if (!empty($this->filter)) {
            // Se houver filtro, será redirecionado para o método de busca.
            $this->search();
        } else {
            // Se não houver filtro, retorna todos os registros.
            $this->users = User::all(); 
        }
    
        return view('livewire.grid', [
            'users' => $this->users 
        ]);
    }
}
