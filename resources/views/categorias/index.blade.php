@extends('admin.app')
@section('contenido')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content ">
        <div class="modal-header modal-header-primary">
          <h5 class="modal-title" id="exampleModalLabel">Registrar categoria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="#" method="POST" id="agregar_form" >
            @csrf
          <div class="modal-body">   
              <div class="row">
                <div class="form-group col-12"> 
                <label for="categoria" >Nombre categoria</label>
                  <input type="text"   name ="categoria" class="form-control form-control-round" placeholder="Nombre.." id="categora" onkeypress="return soloLetras(event)" required>
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
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header modal-header-warning">
          <h5 class="modal-title" id="staticBackdropLabel">Editar categoria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="#" method="POST" id="editar_form" >
          <div class="modal-body">
            <div class="row">
              <div class="col-lg">
                @csrf
                <input type="hidden" name="categoria_id" id="categoria_id">
                <label for="fname">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control"  onkeypress="return soloLetras(event)" required>
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
                  data-toggle="modal" data-target="#exampleModal">Registra categoria <i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>
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
    function tableCategoria()
    {
      $.ajax
      ({
        url: '{{ route('categorias.table') }}',
        method: 'GET',
        success: function(data)
        {
          let tabla = 'table';
          $("#datatable-table").empty();
          $("#datatable-table").append(data);
          tableEs(tabla);
        }
      });
    }

    $( document ).ready(function() {
      tableCategoria();
    });

    $("#agregar_form").submit(function(e){
      e.preventDefault();
      const fd = new FormData(this);
      $.ajax
      ({
        url: '{{url('categorias/store')}}',
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
            $('#exampleModal').modal('hide');
            Swal.fire
            (
              'Agregado!',
              'Categoria añadido con éxito!',
              'success'
            );
            tableCategoria();
          }
          $("#agregar_form")[0].reset(); 
        }
      });
    });

    $("#editar_form").submit(function(e){
      e.preventDefault();
      const fd = new FormData(this);
      $("#editar_btn").text('Actualizando...');
      $.ajax
      ({
        url: '{{url('categorias/update')}}',
        method: 'POST',
        data: fd,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response)
        {
          if (response.status == 200)
          {
            Swal.fire(
              'ACTUALIZADO!',
              'Se actualizo correctamente!',
              'success'
            );
            tableCategoria();
          }
          $("#editar_btn").text('GUARDAR');
          $("#editar_form")[0].reset();
          $("#staticBackdrop").modal('hide');
        }
      });
    });

     // funcion para editar con ajax request
     $(document).on('click', '.editar', function(e){
      e.preventDefault();
      let id = $(this).attr('id');
      $.ajax
      ({
        url: '{{ route('categorias.edit') }}',
        method: 'GET',
        data: {id: id,_token: '{{ csrf_token() }}'},
        success: function(response) {
          $("#nombre").val(response.nombre_categoria);
          $("#categoria_id").val(response.cod_categoria);
        }
      });
    });

    //funcion para eliminar con ajax
    $(document).on('click', '.eliminar',function(e){
      e.preventDefault();
      let id = $(this).attr('id');
      let csrf = '{{ csrf_token() }}';
      Swal.fire
      ({
        title: 'Estas seguro?',
        text: "De elimnar a esta categoria!",
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
              url: '{{ route('categorias.destroy')}}',
              method: 'POST',
              data: {id: id, _token: csrf},
              success: function(response)
              {
                Swal.fire(
                  'Eliminado!',
                  'Se elimino Correctamente .',
                  'success'
                );
                tableCategoria();
              }
            });
          }
        })
    });
  </script>
@endsection
