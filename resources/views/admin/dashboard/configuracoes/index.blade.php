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
                        <?php $i = 0; ?>
                        @foreach ($configs['patrocinadores']['valor'] as $key => $value)
                            @if ($value!="")
                                <div class="row pl-2 mb-2">
                                    <div class="col-md-4 text-center" style="border: 1px solid black;">
                                        <img width="80%" src="<?=$value?>"/>
                                    </div>
                                    <div class="col-md-6">
                                        <table style="margin-left:15px;" width="100%">
                                            <tr>
                                                <td>
                                                    <input class="form-check-input toggleInputPatrocinadores" id="input-patrocinador-url-<?=$i?>" data-id-logo="<?=$i?>" class="" type="radio" name="tipo_upload_logo<?=$i?>" value="1" checked/> Link
                                                </td>
                                                <td>
                                                    <input class="form-check-input toggleInputPatrocinadores" id="input-patrocinador-upload-<?=$i?>" data-id-logo="<?=$i?>" class="" type="radio" name="tipo_upload_logo<?=$i?>" value="0"/> Upload de imagem
                                                </td>
                                            </tr>
                                        </table>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-logo-<?=$i?> input-logo-url-<?=$i?>">
                                                    <label>Endereço da logo:</label>
                                                    <input class="form-control inputs-config-patrocinadores" type="text" value="<?=$value?>" name="patrocinadores" data-id="<?=$configs['patrocinadores']['id']?>" data-type="array"/>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="display:none;">
                                                <div class="input-logo-<?=$i?> input-logo-upload-<?=$i?>">
                                                    <input type="file" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </td>
    </tr>
@endsection
@section('onPageJS')
    <script type="text/javascript">
        
        function uploadArquivo(arquivo){
                
        }

        $(function(){
            var tipo_logo = [0, 0, 0, 0];
            $(".toggleInputPatrocinadores").click(function(){
                var id = $(this).attr("data-id-logo");
                tipo_logo[id] = $(this).val();
                if ($(this).val()==1) {
                    $(".input-logo-url-" + id).parent('.col-md-12').css("display", "block");
                    $(".input-logo-upload-" + id).parent('.col-md-12').css("display", "none");
                } else {
                    $(".input-logo-upload-" + id).parent('.col-md-12').css("display", "block");
                    $(".input-logo-url-" + id).parent('.col-md-12').css("display", "none");
                }
            });

            $("#saveChanges").click(function(){
                var inputs_id = [];
                var inputs_values = [];
                // console.log();
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