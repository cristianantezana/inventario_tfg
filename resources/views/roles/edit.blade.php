@extends('admin.app')
@section('contenido')

  <div class="card card-default">
    <div class="px-6 py-4">
      <section class="section">
        <div class="section-header modal-header-primary">
            <h4 class="page__heading">Editar rol</h4>
        </div>
        <div class="section-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="card card card-primary">
                <form method="POST" action="{{ route('roles.update', $role->id) }}" class="form-horizontal">
                  @csrf
                  @method('PUT')
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Rol</span>                        
                        </div>
                     
                        <input value="{{ old('name', $role->name) }}" autocomplete="off" autofocus class="form-control"  name="name" type="text" onkeypress="return soloLetras(event)" />
                      </div>
                    </div>              
                  </div>    
                 
    <div class="row">
      @foreach ($permissions as $id => $permission)
      <div class="col-md-6" >
        <div class="border border-top-0 rounded table-responsive email-list">
          <table class="table mb-0 table-email">
            <tbody>
              <tr class="unread">
                <td class="mark-mail">
                  <label class="control control-checkbox mb-0">
                    <input type="checkbox"  type="checkbox" name="permissions[]"
                    value="{{ $id }}" {{ $role->permissions->contains($id) ? 'checked' : '' }} />
                    <div class="control-indicator"></div>
                  </label>
                 <b>{{ $permission }}</b> 
                </td>  
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      @endforeach
    
    
    </div>
    

               <br>     
                    
                    <div class="col-md-6">
                      <button type="submit" class="btn btn-primary">Actualizar</button>
                      <a class="btn btn-danger" href="{{route('roles.index')}}">Volver</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>





@endsection
@section('script')
  @if (session('mensaje') == 'ok')
    <script>
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Realizado correctamente',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
  @endif
  @php
      $permisos = [5,6];
  @endphp
  @foreach ($role->permissions as $item)
      @php
        array_push($permisos, $item->id)
      @endphp
  @endforeach
  <script type="text/javascript">
    $(document).ready(function(){
      $('.select2').select2();
      let data=[5,6];




    })


  </script>
@endsection


