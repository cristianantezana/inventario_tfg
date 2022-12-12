@extends('admin.app')
@section('contenido')
 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content ">
      <div class="modal-header modal-header-primary">
        <h5 class="modal-title" id="exampleModalLabel">BIENVENIDO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <center>
              <p><b>Bienvenido a la distribuidora Angel S.R.L.</b><br>Productos de calidad y mejor precio</p>
            </center>     
          </div>>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </div>
</div>
<!-- Fin de Modal -->
<div class="card card-default">
  
  <div class="card-body">
   <center>
    <img   src="{{asset('images/lotu.jpg')}}" alt="Slide Image" style=" width: 400px;
    height: 400px;"> 
  
   </center>
     

  

  </div>
</div>
 
@endsection
@section('script') 
@isset($mensaje)
@if ($mensaje == 'ok')
<script>
  console.log('perra');
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Realizado correctamente',
    showConfirmButton: false,
    timer: 1500
    })
</script> 
@endif   
@endisset
   
  <script type="text/javascript">
  (function(){
    $(function(){
      $('#exampleModal').modal()
    })
  }());
  </script>
@endsection
