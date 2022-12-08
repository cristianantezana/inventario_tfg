@extends('admin.app')
@section('contenido')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content ">
        <div class="modal-header modal-header-primary">
          <h5 class="modal-title" id="exampleModalLabel">Registrar medida</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
   
        <form action="#" method="POST" id="agregar_form" >
            @csrf
          <div class="modal-body">   
          <div class="row">
                <div class="form-group col-6"> 
                <label for="nombre_medida" >Nombre de la medida</label>
            <input type="text"   name ="nombre_medida" class="form-control form-control-round" placeholder="Nombre" onkeypress="return soloLetras(event)" required>
                </div>
                <div class="form-group col-6"> 
                <label for="sigla_medida" >Sigla de la medida</label>
                <input type="text"   name ="sigla_medida" class="form-control form-control-round" placeholder="Sigla"  onkeypress="return soloLetras(event)" required>
                </div>
              </div>
         


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
      </form>
    </div>
  </div>
  <!-- Fin de Modal -->
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header modal-header-warning">
          <h5 class="modal-title" id="staticBackdropLabel">Editar medida</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="#" method="POST" id="editar_form" >
          <div class="modal-body">
            <div class="row">
              <div class="col-lg">
                  @csrf
                  <input type="hidden" name="medida_id" id="medida_id">
                  <label for="nombre_medida" >Nombre de la medida</label>
                  <input type="text" id="nombre_medida"  name ="nombre_medida" class="form-control form-control-round"  onkeypress="return soloLetras(event)" required>
                  <br>
                  <label for="sigla_medida" >Sigla de la medida</label>
                  <input type="text" id="sigla_medida"  name ="sigla_medida" class="form-control form-control-round" onkeypress="return soloLetras(event)" required>
                  <br>
              </div>
            </div>  
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button  type="submit" id="editar_btn" class="btn btn-warning" >Editar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{-- fin modal editar --}}
  <input type="hidden" id="ruta" value="{{url('/')}}">
<div class="row">
  <div class="col-md-12">
    <div class="full">
      <div class="page-header card">
        <div class="card-block">
          @if (session('status'))
              <div class="alert alert-success">{{session('status') }}</div>
          @endif
          <div class="card-body">
              <div class="row">
                <div class="form-group col-12">      
                  <button type="button" style="float: right; color: white; font-weight: bold;" class="btn btn-primary" 
                  data-toggle="modal" data-target="#exampleModal">Registra medida <i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>
                  </button>
                </div>
              </div>
            <div class="card-block table-border-style">
              <div class="table-responsive"> 
              <div id="datatable-table" ></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div> 
@endsection
@section('script')  
  <script type="text/javascript">
      function tableMedida()
      {
        $.ajax
        ({
          url: '{{ route('medidas.table') }}',
          method: 'GET',
          success: function(data)
          {
            let tabla = 'table_medida';
            $("#datatable-table").empty();
            $("#datatable-table").append(data);
            tableEs(tabla);
          }
        });
      } 
      $("#agregar_form").submit(function(e){
        e.preventDefault();
        const fd = new FormData(this);
        $.ajax
        ({
          url: '{{url('medidas/store')}}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response)
          {
            if(response.status == 200)
            {
              $("#exampleModal").modal('hide');
              Swal.fire(
                'Agregado!',
                'Medida añadido con éxito!',
                'success'
              )
              tableMedida();
            }
            $("#agregar_form")[0].reset();
          }
        });
      });
      $( document ).ready(function(){
        tableMedida(); 
      });
      $("#editar_form").submit(function(e){
        e.preventDefault();
        const fd = new FormData(this);
        $("#editar_btn").text('Actualizando...');
        $.ajax
        ({
          url: '{{url('medidas/update')}}',
          method: 'POST',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response)
          {
            if(response.status == 200)
            {
              Swal.fire(
                'ACTUALIZADO!',
                'Se actualizo correctamente!',
                'success'
              )
              tableMedida();
            }
            $("#editar_btn").text('GUARDAR');
            $("#editar_form")[0].reset();
            $("#staticBackdrop").modal('hide');
          }
        });
      });
      // editar con ajax request
      $(document).on('click', '.editar', function(e){
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax
        ({
          url: '{{ route('medidas.edit') }}',
          method: 'GET',
          data: {id: id,_token:'{{ csrf_token() }}'},
          success: function(response)
          {
            $("#nombre_medida").val(response.nombre_medida);
            $("#sigla_medida").val(response.sigla_medida);
            $("#medida_id").val(response.cod_medida);
          
          }
        });
      });
      $(document).on('click', '.eliminar', function(e){
        e.preventDefault();
        let id = $(this).attr('id');
        let csrf = '{{ csrf_token() }}';
        Swal.fire
        ({
          title: 'Estas seguro?',
          text: "De elimnar a este registro!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, eliminar!',
          cancelButtonText: 'Cancelar'
        }).then((result) =>
          {
            if (result.isConfirmed)
            {
              $.ajax
              ({
                url: '{{ route('medidas.destroy') }}',
                method: 'DELETE',
                data: {id: id,_token: csrf},
                success: function(response)
                {
                  Swal.fire(
                    'Eliminado!',
                    'Se elimino Correctamente .',
                    'success'
                  );
                  tableMedida();
                }
              });
            }
          })
      });
  </script>
@endsection