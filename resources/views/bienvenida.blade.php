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
   <div class="slider-container">  
    <img  class="slider-item" src="{{asset('images/logoooo.jpg')}}" alt="Slide Image"> 
  </div>  
@endsection
@section('script')  
  <script type="text/javascript">
  (function(){
    $(function(){
      $('#exampleModal').modal()
    })
  }());
   
  </script>
@endsection
