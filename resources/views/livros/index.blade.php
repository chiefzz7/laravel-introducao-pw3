<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros - Atividade Avaliativa PW3</title>
</head>
<body>
    <h1>Cadastro de Livros</h1>

    <form action="/livros" method="post">
        @csrf

        <label for="titulo">Título</label><br>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="autor">Autor</label><br>
        <input type="text" id="autor" name="autor" required><br><br>

        <label for="ano_publicacao">Ano Publicado</label><br>
        <input type="number" id="ano_publicacao" name="ano_publicacao" required><br><br>

        <button type="submit">Salvar</button>
    </form>

    <h2>Lista de Livros Cadastrados</h2>

    @if($livros->isEmpty())
        <p>Nenhum livro cadastrado.</p>
    @else
        <ul>
            @foreach($livros as $livro)
                <li>
                    Título: {{ $livro->titulo }} - Autor: {{ $livro->autor }} - Ano publicado: {{ $livro->ano_publicacao }}
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>