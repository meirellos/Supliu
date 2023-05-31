<form action="{{ route('tracks.store', ['albumId' => $album->id]) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Numero do Album</label>
        <input type="text" name="numero" id="id" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="name">Nome da Faixa</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="duration">Duração</label>
        <input type="text" name="duration" id="duration" class="form-control" required>
    </div>
    <!-- Outros campos da faixa -->
    <button type="submit" class="btn btn-primary">Adicionar Faixa</button>
</form>