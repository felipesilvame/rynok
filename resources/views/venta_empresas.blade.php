<section id="acciones" class="main special">
	<h3>Resumen de Venta de Acciones</h3>
	<div class="table-wrapper">
		<table class="alt">
			<thead>
				<tr>
					<th>Empresa</th>
					<th>Acciones Vendidas</th>
					<th>Acciones Disponibles</th>
				</tr>
			</thead>
			<tbody id="empresas_body">
			</tbody>
		</table>
	</div>
	<p>*El límite de compra es de 100 acciones por persona.</p>
</section>
<script type="text/javascript">
	var waiting = 0;
function reloadInfo(){
	if (!waiting){
		waiting = 1;
		$.getJSON("{!! route('infoEmpresas') !!}", function(data, status){
			if (!jQuery.isEmptyObject(data)) {
				var tbody = $('#empresas_body');
				tbody.empty();
				$.each(data, function(i, item) {
					//<![CDATA[
				    var tr = $('<tr/>').appendTo(tbody);
				    tr.append('<td>' + item.nombre + '</td>');
				    tr.append('<td>' + 500 - item.acciones_disponibles_p_vender + '</td>');
				    tr.append('<td>' + item.acciones_disponibles_p_vender + '</td>');
				    //]]>
				})
			}
			waiting=0;
    	});
	}
}
setInterval( reloadInfo, 1500 );
</script>