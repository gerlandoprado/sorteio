<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Participantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center mb-4">Ganhe uma caixa de bombom Garoto</h1>

                @if (!Cookie::has('participante_cadastrado'))
                    <form action="{{ route('store.update') }}" method="POST" class="mb-4">
                        @csrf
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite seu nome" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Participar</button>
                    </form>
                @else
                    <div class="alert alert-success text-center">
                        Você já se cadastrou como <strong>{{ Cookie::get('participante_cadastrado') }}</strong>
                    </div>
                @endif
                <h2 class="text-center">Lista de Participantes</h2>
                <ul class="list-group">
                    @forelse ($participantes as $participante)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $participante->nome }}
                            <span class="badge bg-primary rounded-pill">{{ $participante->id }}</span>
                        </li>
                    @empty
                        <li class="list-group-item">Nenhum participante cadastrado.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>