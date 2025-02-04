<div>
  <div class="card">
    {{-- *BUSCADOR Lista de usuarios --}}
    <div class="card-header">
      <input wire:keydown="limpiar_page" wire:model.live="search" class="form-control w-100" type="search" name="search"
        placeholder="Buscar usuario" autocomplete="off">
    </div>

    @if ($users->count())
      {{-- *TABLA Lista de usuarios --}}
      <div class="card-body table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Email</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit', $user) }}">
                    Editar
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      {{-- *Paginación --}}
      <div class="card-footer d-flex justify-content-center">
        {{ $users->links() }}
      </div>
    @else
      <div class="card-body">
        <strong>No hay usuarios encontrados...</strong>
      </div>
    @endif
  </div>
</div>
