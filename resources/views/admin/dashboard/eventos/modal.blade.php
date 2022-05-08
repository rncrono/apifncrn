<!-- Modal -->
<div class="modal fade" id="modalNovoEvento" tabindex="-1" role="dialog" aria-labelledby="modalNovoEvento" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width:40vw; max-width:40vw;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalNovoEventotTitle">Novo Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('adicionar_evento') }}" method="post">
        @csrf
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="#nomeEvento">Nome do evento:</label><br>
                    <input id="nomeEvento" type="text" class="form-control" placeholder="Nome do evento" name="name"/>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="#dataEvento">Data do evento:</label><br>
                    <input id="dataEvento" type="date" class="form-control" name="data"/>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="#organizador">Organizador:</label><br>
                    <select id="organizador" class="form-select" name="organizador">
                      <option>-- SELECIONE --</option>
                      @foreach ($organizadores as $organizador)
                        <option value="{{ $organizador->id }}">{{ $organizador->name }}</option>
                      @endforeach
                    </select>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <input type="submit" class="btn btn-primary" value="Adicionar"/>
      </div>
    </form>
    </div>
  </div>
</div>
