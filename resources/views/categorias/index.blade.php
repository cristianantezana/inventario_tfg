@extends('layouts.app')
@section('contenido')
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header modal-header-warning">
          <h5 class="modal-title" id="staticBackdropLabel">EDITAR CATEGORIA</h5>
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
            <button  type="submit" id="editar_btn" class="btn btn-success" >GUARDAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{-- fin modal editar --}}
  <div class="content-wrapper">
    <div class="content">
      <div class="card card-default">
        <div class="px-6 py-4">
          <h2>GESTION CATEGORIA</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-4">
          <div class="card text-white bg-primary" style="padding: 6px;">
            <h4> <center>Registrar Categoria</center> </h>
          </div>
          <div class="card card-default">
            <div class="card-body">
              <form action="#" method="POST" id="agregar_form" >
                @csrf
                <div class="form-group">
                  <label for="categoria" >Nombre Categoria</label>
                  <input type="text"   name ="categoria" class="form-control form-control-round" placeholder="Nombre......." id="categora" onkeypress="return soloLetras(event)" required>
                </div>
                <div class="form-footer mt-12">
                  <button type="submit" class="btn btn-primary btn-pill  btn-block">GUARDAR</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-xl-8">
          <div class="card text-white bg-primary" style="padding: 6px;">
            <h4> <center>Lista de categorias</center> </h>
          </div>
          <div class="card card-default">
            <div class="card-body">   
              <div id="datatable-table" ></div>
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
