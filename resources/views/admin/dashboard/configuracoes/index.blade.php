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
                    <div class="col-md-12">
                        <h2>Banner inicial:</h2>
                        <img width="40%" src="<?=$configs['banner_inicial']?>"/>
                        <br>
                        <input class="form-control mt-2 inputs-config" type="text" style="width: 70%" name="banner_inicial" data-id="<?=$configs['id']?>" value="<?=$configs['banner_inicial']?>"/>
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
                $.post("{{ route('salvar_configuracoes') }}", { '_token':"{{ csrf_token()}}", 'inputs_id':inputs_id, 'inputs_values':inputs_values}, function(response){
                    console.log(response);
                });
            });
        });
    </script>
@endsection