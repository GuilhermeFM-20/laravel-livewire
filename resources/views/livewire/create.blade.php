<div class="flex-center position-ref ">
    <div class="flex-center position-ref ">
        <div class="container pt-3"> 

            {{-- Verifica se existe algum erro para retornar para o usuário. --}}
            @error('name')  <div class="alert alert-warning" role="alert">{{ $message }}</div> @enderror
            @error('email')  <div class="alert alert-warning" role="alert">{{ $message }}</div> @enderror
            @error('password')  <div class="alert alert-warning" role="alert">{{ $message }}</div> @enderror
            @error('password_verify')  <div class="alert alert-warning" role="alert">{{ $message }}</div> @enderror

            <div class="card">
                <form wire:submit.prevent="save">
                    @csrf
                    <div class="col-md-6">
                        <h2>Cadastro</h2>
                    </div>
                    <div class="form-group row p-2">
                        <div class="col-md-6">
                            <label>Nome:</label>
                            <input type="text" name="name" wire:model="name" class="form-control" >
                        </div>
                        <div class="col-md-6">
                            <label>Email:</label>
                            <input type="email" name="email" wire:model="email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row  p-2">
                        <div class="col-md-6">
                            <label>Senha:</label>
                            <input type="password" name="password" wire:model="password" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Confirmar Senha:</label>
                            <input type="password" name="password_verify" wire:model="password_verify" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row  p-2">
                        <div class="col-md-6">
                            <a  wire:click="grid" class="btn btn-info">Voltar</a>
                            <input type="submit" class="btn btn-success" value="Gravar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>