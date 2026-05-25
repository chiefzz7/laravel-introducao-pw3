<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Laravel</title>
</head>
<body>
    <h1>Cadastro de Produtos</h1>

    <form action="/produtos" method="post">
        @csrf

        <label for="nome">Nome</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="preco">Preço</label><br>
        <input type="number" step="0.01" id="preco" name="preco" required><br><br>

        <label for="estoque">Estoque</label><br>
        <input type="number" id="estoque" name="estoque" required><br><br>

        <button type="submit">Salvar</button>
    </form>

    <h2>Lista de produtos</h2>

    @if($produtos->isEmpty())
        <p>Nenhum produto cadastrado.</p>
    @else
        <ul>
            @foreach($produtos as $produto)
                <li>
                    {{ $produto->nome }} - R$ {{ number_format($produto->preco, 2, ',', '.') }} - Estoque: {{ $produto->estoque }}
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>