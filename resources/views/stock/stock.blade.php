@extends('layouts.admin')
@section('main-content')
<div class="row">
    <div class="col-md-12" >
        <div class="panel panel-default">
            <div class="panel-heading" style="background: #222d32   ; color: #FFFFFF;  opacity: 0.9;">
                <div class="row">
                    <div class="col-md-4" style="float: left;">
                        <h3 class="panel-title" style="margin-top: 10px;">Gestionar stock</h3>
                    </div>
                </div>
            </div>
            <div class="panel-body" style="background: #D7D7D7">
                <!-- Mensajes de exito-->
                @if (session('status'))
                    <div class="alert alert-success" id="ocultar">
                        {{ session('status') }}
                    </div>
                @endif
                @if(count($errors)>0)
                    <div class="alert alert-warning" role="alert" id="ocultar2">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                    </div>
                @endif 
                
                <form method="POST" action="/admin/stock/nuevo/post" accept-charset="UTF-8" class="form-horizontal">
                    @verbatim
                    <stock></stock>
                    @endverbatim
                    <input class="btn btn btn-success" tabindex="1" type="submit" value="Cargar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
                    
                    <!--<vuetable></vuetable>-->
                
                <table class="table table-striped table-bordered tabla-filtro" width="100%" id="table">
                    <thead>
                        <tr>
                            <th>Código de barras</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Serial</th>
                            <th>Fecha de entrada</th>
                            <th>Fecha de salida</th>
                            <th>Precio de entrada</th>
                            <th>Precio de salida</th>
                            <th>Proveedor</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="panel-footer">

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delete" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form method="POST" action="/admin/stock/eliminar" accept-charset="UTF-8" class="form-horizontal">
                <div class="modal-header" style="background: #222d32   ; color: #FFFFFF;  opacity: 0.9;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="titulo"> Deshabilitar area</h4>
                </div>
                <div class="modal-body">
                    <p class="help-block">¿Esta seguro que desea eliminar este registro de stock?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-success" value="Eliminar">
                    
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="out" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="row">
            <div class="col-md-12">
                <div class="modal-content">
                    <form method="POST" action="/admin/stock/salida" accept-charset="UTF-8" class="form-horizontal">
                        <div class="modal-header" style="background: #222d32   ; color: #FFFFFF;  opacity: 0.9;">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="titulout"> Baja Stock</h4>
                        </div>
                        <div class="modal-body">
                            <!--<p class="help-block">¿Esta seguro que desea eliminar este registro de stock?</p>-->
                            <div class="form-group">
                                <label class="form-label col-sm-8">Fecha de salida:</label>
                                <div class="col-sm-8">
                                <!--<input placeholder="Fecha:" value="<?php echo \Carbon\Carbon::now()->format('Y-m-d');?>" type="text" class="form-control" id="fecha_out" name="fecha_out"readonly="true">-->
                                <!--<vuejs-datepicker input-class="form-control" :value="state.date" format="yyyy-MM-dd" name="fecha_out" placeholder="Fecha" :language="es" full-month-name></vuejs-datepicker>-->
                                </div>
                                <label class="form-label col-sm-8">Precio de salida:</label>
                                <div class="col-sm-8">
                                <input type="number" class="form-control" name="precioSalida" id="precioSalida">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" class="id">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-success" value="Confirmar">
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
@push('scripts')
<script>
</script>

@endsection