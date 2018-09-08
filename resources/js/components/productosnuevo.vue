<template>
	<div class="panel-body" style="background: #D7D7D7">
        <div class="form-group">
            <label class="control-label col-sm-2">Tipo:</label>
            <div class="col-sm-4">
            	<v-select :options="tipos" v-model="tipo" placeholder="Tipo de producto" taggable required></v-select>
                <template v-if="tipo != null">
                    <input type="hidden" name="tipo" v-model="tipo">
                </template>
            	<!--<select name="tipo" class="form-control" style="width: 100%" id="tipo" required></select>-->
            </div>
            <label class="control-label col-sm-2">Marca:</label>
            <div class="col-sm-4"> 
                <!--<select class="form-control" name="tipo" required="true" id="tipo">
				</select>-->
				<v-select :options="marcas" v-model="marca" placeholder="Marca" taggable required></v-select>
                <template v-if="marca != null">
                    <input type="hidden" name="marca" v-model="marca">
                </template>
			</div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Modelo:</label>
            <div class="col-sm-4">
                <input class="form-control" style="width: 100%" name="modelo" type="text" required>
            </div>
            <label class="control-label col-sm-2">Código de barras:</label>
            <div class="col-sm-4"> 
                <!--<select class="form-control" name="tipo" required="true" id="tipo">
				</select>-->
				<input class="form-control" type="text" name="codbarras">
			</div>
    	</div>
    </div>
</template>
<script>
	export default
	{
		data: function()
		{
			var datas = 
			{
				tipo: null,
				tipos: [],
				marca: null,
				marcas: []
			}
			return datas;
		},
		methods:
		{
			cargarSelects: function()
			{
				this.tiposdeproductos();
				this.getmarcas();
			},
			tiposdeproductos: function()
            {
                axios.get('/ajax/tiposprods')
                    .then(response => {
                        this.tipos = response.data;
                });
            },
            getmarcas: function()
            {
            	axios.get('/ajax/marcas')
            		.then(response => {
            			this.marcas = response.data;		
        		});
            }
		},
		beforeMount()
        {
            this.cargarSelects();
        }
	}
</script>