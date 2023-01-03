
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Factura</title>
    <link rel="stylesheet" href="style.css">
    <style>
      
*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}
p, label, span, table{
	font-family: 'BrixSansRegular';
	font-size: 9pt;
}
.h2{
	font-family: 'BrixSansBlack';
	font-size: 16pt;
}
.h3{
	font-family: 'BrixSansBlack';
	font-size: 12pt;
	display: block;
	background: #1a6abf;
	color: #FFF;
	text-align: center;
	padding: 3px;
	margin-bottom: 5px;
}
#page_pdf{
	width: 95%;
	margin: 15px auto 10px auto;
}

#factura_head, #factura_cliente, #factura_detalle{
	width: 100%;
	margin-bottom: 10px;
}
.logo_factura{
	width: 25%;
}
.info_empresa{
	width: 50%;
	text-align: center;
}
.info_factura{
	width: 25%;
}
.info_cliente{
	width: 100%;
}
.datos_cliente{
	width: 100%;
}
.datos_cliente tr td{
	width: 50%;
}
.datos_cliente{
	padding: 10px 10px 0 10px;
}
.datos_cliente label{
	width: 75px;
	display: inline-block;
}
.datos_cliente p{
	display: inline-block;
}

.textright{
	text-align: right;
}
.textleft{
	text-align: left;
}
.textcenter{
	text-align: center;
}
.round{
	border-radius: 10px;
	border: 1px solid #1a6abf;
	overflow: hidden;
	padding-bottom: 15px;
}
.round p{
	padding: 0 15px;
}

#factura_detalle{
	border-collapse: collapse;
}
#factura_detalle thead th{
	background: #1a6abf;
	color: #FFF;
	padding: 5px;
}
#detalle_productos tr:nth-child(even) {
    background: #ededed;
}
#detalle_totales span{
	font-family: 'BrixSansBlack';
}
.nota{
	font-size: 8pt;
}
.label_gracias{
	font-family: verdana;
	font-weight: bold;
	font-style: italic;
	text-align: center;
	margin-top: 20px;
}

    </style>
</head>
<body>

<div id="page_pdf">
	<table id="factura_head">
		<tr>
			<td class="logo_factura">
				<div>
          <img src="{{asset('images/lotu.jpg')}}" style="border-radius: 5px;width:100px;" alt="lOGO">
				</div>
			</td>
			<td class="info_empresa">
				<div>
					<span class="h2">DISTRIBUIDORA ANGEL</span>
					<p>Urbanización Paititi calle Beni #25</p>
					<p>Celular +(591) 78505580</p>
					<p>Email: angel@info.com</p>
				</div>
			</td>
			<td class="info_factura">
				<div class="round">
					<span class="h3">Pedido</span>
          @foreach ($pedidos as $pedido)
          <p>No. Pedido: <strong>{{$pedido->n_pedido}}</strong></p>
         
        @endforeach
        @foreach ($pedidos as $pedido)
        <p>Fecha: {{$pedido->fecha_pedido}}</p>
        
      @endforeach
				
				</div>
			</td>
		</tr>
	</table>
	<table id="factura_cliente">
		<tr>
			<td class="info_cliente">
				<div class="round">
					<span class="h3">Cliente</span>
					<table class="datos_cliente">
						<tr>
              @foreach ($pedidos as $pedido)
              
              <td><label>Nit:</label><p>{{$pedido->cliente->persona->nit}}</p></td>
            @endforeach 
							
              @foreach ($pedidos as $pedido)
              <td><label>Teléfono:</label> <p>{{$pedido->cliente->persona->celular}}</p></td>
              
            @endforeach 
							
						</tr>
						<tr>
              @foreach ($pedidos as $pedido)
              
              <td><label>Nombre:</label><p>{{$pedido->cliente->persona->nombre.' '.$pedido->cliente->persona->apellido}}</p></td>
            @endforeach 
            @foreach ($pedidos as $pedido)
            <td><label>Dirección:</label> <p>{{$pedido->cliente->persona->direccion}}</p></td>
            
          @endforeach 
							
						</tr>
					</table>
				</div>
			</td>

		</tr>
	</table>

	<table id="factura_detalle">
			<thead>
				<tr>
					<th width="50px">Cant.</th>
					<th class="textleft">Descripción</th>
					<th class="textright" width="150px">Precio Unitario.</th>
					<th class="textright" width="150px"> Precio Total</th>
				</tr>
			</thead>
      <?php $total = 0?>
			<tbody id="detalle_productos">
        @foreach ($detalle_pedido as $detalle)
        <?php $subtotal = $detalle->precio_detalle * $detalle->cantidad_detalle?>
      <tr>
        <td class="textcenter">{{$detalle->cantidad_detalle}}</td>
        <td >{{$detalle->catalogo->producto->nombre_producto}}</td>
        <td class="textright">{{$detalle->precio_detalle}}</td>
        <td class="textright"><?php echo $subtotal ?></td>
      </tr>
     <?php $total = $total + $subtotal ;?>
    @endforeach 
			
			</tbody>
			<tfoot id="detalle_totales">
				<tr>
					<td colspan="3" class="textright"><span><b>TOTAL</b> </span></td>
					<td class="textright"><span> <?php echo $total ?>/Bs</span></td>
				</tr>
		</tfoot>
	</table>
	<div>
		<h4 class="label_gracias">¡Gracias por su compra!</h4>
	</div>

</div>

</body>
</html>