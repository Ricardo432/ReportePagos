$(document).on("ready",function(){

	

		id = $(this).val();

		$.post("inc/model.php","id="+id,function(datos){
			$("select[name='residentes']").html("");
			options = "<option>Buscar</option>";
			$("select[name='residentes']").append(options);
			for(i = 0; i < datos.length; i++){
				$("select[name='residentes']").append("<option value="+datos[i]+">"+datos[(i+1)]+": "+datos[(i+2)]+"</option>");
				i+2;
			}
		},'json');

		

	
});
