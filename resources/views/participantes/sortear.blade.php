<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Sorteio</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #numero-sorteado {
            font-size: 3rem;
            font-weight: bold;
            color: #007bff;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center mb-4">Sorteio</h1>

                <div class="card shadow p-4 text-center">
                    <h2 class="mb-3">Número Sorteado:</h2>
                    <div id="numero-sorteado">...</div>
                    <h3 class="mt-3" id="vencedor-nome"></h3>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('participantes.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const numeroSorteado = document.getElementById('numero-sorteado');
            const vencedorNome = document.getElementById('vencedor-nome');
            const vencedorId = {{ $vencedor->id }};
            const vencedorNomeTexto = "Parabéns, {{ $vencedor->nome }}!";
            
            let interval = setInterval(() => {
                numeroSorteado.textContent = Math.floor(Math.random() * 30) + 1;
            }, 100);

            setTimeout(() => {
                clearInterval(interval);
                numeroSorteado.textContent = vencedorId;
                vencedorNome.textContent = vencedorNomeTexto;
            }, 5000);
        });
    </script>
</body>
</html>

