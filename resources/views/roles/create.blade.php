@extends('admin.app')
@section('contenido')

  <div class="card card-default">
    <div class="px-6 py-4">
      <section class="section">
        <div class="section-header modal-header-primary">
            <h4 class="page__heading">Nuevo rol</h4>
        </div>
        <div class="section-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="card card card-primary">
                <form method="POST" action="{{ route('roles.store') }}" class="form-horizontal">
                  @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Rol</span>                        
                        </div>
                     
                        <input  required autocomplete="off" autofocus class="form-control"  name="rol" type="text" onkeypress="return soloLetras(event)" />
                      </div>
                    </div> 
                    <div class="col-md-3">
                      <div class="input-group">
                        
                     
                        <input type="button" class="btn btn-primary" id="BtnSeleccionar" value="Seleccionar todos"/>
                      </div>
                    </div> 
                    <div class="col-md-2">
                      <div class="input-group">     
                        <input type="button" class="btn btn-danger" id="DesSeleccionar" value="Desmarcar todos"/>
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
                <td class="mark-mail" id="DivColores">
                  <label class="control control-checkbox mb-0">
                    <input type="checkbox"  type="checkbox" name="permissions[]"
                    value="{{ $id }}" />
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
                      <button type="submit" class="btn btn-primary">Guardar</button>
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
  <script type="text/javascript">
    $(document).ready(function(){
            $('#BtnSeleccionar').click(function(){
                $('#DivColores input[type=checkbox]').attr("checked","checked");
            });
            $('#DesSeleccionar').click(function(){
                $('#DivColores input[type=checkbox]').attr("checked",false);
            });
        });

  </script>
 
@endsection


