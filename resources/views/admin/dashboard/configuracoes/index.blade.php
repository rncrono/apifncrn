@extends('admin.layout.main')
@section('title')
    Configurações
@endsection
@section('content')
    <tr>
        <td style="position:relative">
            <div class="sub-content">
                <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-3">
                        <button class="btn btn-primary" id="saveChanges">SALVAR</button>
                    </div>
                </div>
                <div class="row">
                    <h2>Banner inicial:</h2>
                    <div class="col-md-4">
                        <img width="100%" src="<?=$configs['banner_inicial']['valor']?>"/>
                    </div>
                    <div class="col-md-8">
                        <label>Endereço do banner:</label>
                        <input class="form-control mt-2 inputs-config" type="text" style="width: 70%" name="banner_inicial" data-id="<?=$configs['banner_inicial']['id']?>" value="<?=$configs['banner_inicial']['valor']?>"/>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <h2>Patrocinadores:</h2>
                        <?php foreach ($configs['patrocinadores']['valor'] as $key => $value) { 
                            if ($value!="") { ?>
                                <div class="row mb-2">
                                    <div class="col-md-4 text-center" style="border: 1px solid black;">
                                        <img width="40%" src="<?=$value?>"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Endereço da logo:</label>
                                        <input class="form-control inputs-config-patrocinadores" type="text" value="<?=$value?>" name="patrocinadores" data-id="<?=$configs['patrocinadores']['id']?>" data-type="array"/>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </td>
    </tr>
@endsection
@section('onPageJS')
    <script type="text/javascript">
        $(function(){
            $("#saveChanges").click(function(){
                var inputs_id = [];
                var inputs_values = [];
                $("body").find(".inputs-config").each(function(){
                    inputs_id.push($(this).attr('data-id'));
                    inputs_values.push($(this).val());
                });
                var patrocinadores = "";
                $("body").find(".inputs-config-patrocinadores").each(function(){
                    patrocinadores += $(this).val() + ";";
                });
                inputs_id.push($(".inputs-config-patrocinadores:first").attr('data-id'));
                inputs_values.push(patrocinadores);
                $.post("{{ route('salvar_configuracoes') }}", { '_token':"{{ csrf_token()}}", 'inputs_id':inputs_id, 'inputs_values':inputs_values}, function(response){
                    window.location.href="#";
                });
            });
        });
    </script>
@endsection