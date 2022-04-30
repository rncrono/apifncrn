@extends('admin.layout.main')
@section('title')
    Eventos
@endsection
@section('content')
<tr>
    <td style="position:relative">
        <div class="sub-content">
            <div class="row">
                <div class="col-md-2">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalNovoEvento" aria-expanded="false" aria-controls="modalNovoEvento">
                        Novo Evento
                        <i class="fas fa-plus-circle"></i>
                    </button>
                    @include('admin.dashboard.eventos.modal')
                </div>
                <div class="col-md-10">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h4>EVENTOS:</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <th>Evento</th>
                            <th>Organizador</th>
                            <th>Data</th>
                            <th>Excluir</th>
                        </thead>
                        @foreach($eventos as $evento)
                            <tr id="evento-{{ $evento->id }}">
                                <td>{{ $evento->evento_titulo }}</td>
                                <td>{{ $evento->organizador_nome }}</td>
                                <td>{{ $evento->data }}</td>
                                <td>
                                   <button class="btn btn-danger" id="deleteEvento" data-id="{{ $evento->id }}">
                                       <i class="fas fa-trash"></i>
                                   </button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </td>
</tr>
@endsection
@section('onPageJS')
    <script>

        function deleteEvento(id){
            $.post("{{ route('delete_evento') }}", { 'id' : id, '_token': '{{ csrf_token() }}'}, function(response){
                $("#evento-" + id).remove();
            });
        }

        $(function(){
            $("#deleteEvento").click(function(){
                var id = $(this).attr('data-id');
                deleteEvento(id);
            });
        });
    </script>
@endsection
