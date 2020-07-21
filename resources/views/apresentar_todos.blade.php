<h1>Cliente e Telefones</h1>

<p>Cliente: {{ $cliente->nome }}</p>
@foreach ($telefones as $telefone)
    <p>Telefone: {{ $telefone->numero }}</p>
@endforeach

