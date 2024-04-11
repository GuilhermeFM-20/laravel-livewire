

<div class="flex-center position-ref ">
    <div class="container pt-3">
        {{-- Verifica se existe alguma mensagem para retornar para o usuário. --}}
        @if (session()->has('mensagem'))
            <div class="alert alert-{{session('type')}}" role="alert">{{ session('mensagem') }}</div>
        @endif
        <div class="card ">
            <div class="row m-2">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button wire:click="search" class="input-group-text" id="btn">🔎</button>
                        </div>
                        <input type="text" class="form-control" wire:model="filter" placeholder="Busca" aria-label="Busca"
                            aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="col-md-6 align-final text-right">
                    <a wire:click="create" class="btn btn-success ">Adicionar</a>
                </div>
            </div>
            <div wire:loading.block>
                <div  class="row d-flex justify-content-center m-2">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead class="thead">
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th width="5"></th>
                        <th width="5"></th>
                    </tr>
                    
                </thead>
                <tbody id="tbody">
                    @foreach ( $users as $user )
                        <tr>
                            <th>{{$user->id}}</th>
                            <th class="esq">{{$user->name}}</th>
                            <th class="esq">{{$user->email}}</th>
                            <th><a wire:click="update({{$user->id}})" class="btn btn-info">Editar</a></th>
                            <th>
                                <a wire:click="delete({{$user->id}})" class="btn btn-danger ">Excluir</a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>     
    </div>
 
</div>



