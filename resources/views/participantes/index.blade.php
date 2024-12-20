<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Participantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-4">Lista de Participantes</h1>

                <div class="d-flex justify-content-between mb-3">
                    <a href="{{ route('participantes.create') }}" class="btn btn-success">Adicionar Participante</a>
                    <a href="{{ route('participantes.sortear') }}" class="btn btn-primary">Sortear</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($participantes as $participante)
                                <tr>
                                    <td>{{ $participante->id }}</td>
                                    <td>{{ $participante->nome }}</td>
                                    <td class="d-flex gap-2">
                                        <a href="{{ route('participantes.edit', $participante->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('participantes.destroy', $participante->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Nenhum participante cadastrado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
