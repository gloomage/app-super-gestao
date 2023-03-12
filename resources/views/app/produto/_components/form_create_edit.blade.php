 @if($produto->id)
    <form method="POST" action="{{ route('produto.update', ['produto' => $produto->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="POST" action="{{ route('produto.store') }}">
        @csrf
@endif
    <input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" class="borda-preta" placeholder="Nome">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    <input type="text" name="descricao" value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Site" class="borda-preta">
    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
    <input type="text" name="peso" value="{{ $produto->peso ?? old('peso') }}" placeholder="UF" class="borda-preta">
    {{ $errors->has('peso') ? $errors->first('peso') : '' }}
    <select name="unidade_id">
        <option>-- Selecione a Unidade de Medida --</option>
        @foreach ($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>{{ $unidade->descricao }}</option>
        @endforeach
    </select>
    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
    <button type="submit" class="borda-preta">Cadastrar</button>
</form>