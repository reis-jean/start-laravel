{{$slot}}
{{-- {{$x}}  --}}
{{-- o slot imprime o conteudo que estiver entre as tags de component, e não tem essa informação como obrigatoria, 
já quando é passado um paramentro pela tags components a informação é obrigatoria e deve ser passada em todas as vies (se não dá erro fatal) --}}
<form action={{route('site.contato')}} method="POST">
    @csrf
    <input name="nome" value="{{old('nome')}}" type="text" placeholder="Nome" class="{{$classe}}">
    @if ($errors->has('nome'))
        {{$errors->first('nome')}}
    @endif
    <br>
    <input name="telefone" value="{{old('telefone')}}"  type="text" placeholder="Telefone" class="{{$classe}}">
      @if ($errors->has('telefone'))
        {{$errors->first('telefone')}}
    @endif
    <br>
    <input name ="email" value="{{old('email')}}"  type="text" placeholder="E-mail" class="{{$classe}}">
     {{$errors->has('email') ? $errors->first('email'): ''}}
    <br>

    <select name ="motivo_contatos_id" class="{{$classe}}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $motivo_contato )
            <option value="{{$motivo_contato->id}}" {{old('motivo_contatos_id') == $motivo_contato->id ? 'selected': '' }}>{{$motivo_contato->motivo_contato}}</option>
            
        @endforeach
        
    </select>
     {{$errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id'): ''}}
    <br>
        <textarea name="mensagem" value={{old('mensagem')}}  class="{{$classe}}"  placeholder="Preencha aqui a sua mensagem">{{ (old('mensagem') != '') ? old('mensagem') : '' }}</textarea>
        {{--para não ser adicionado espaõs no text area é ideal fazer tem em uma linha--}}
     {{$errors->has('mensagem') ? $errors->first('mensagem'): ''}}
    <br>
    <button type="submit"  class="{{$classe}}">ENVIAR</button>
</form>
@if($errors->any())
    <div style="position:absolute; top:0px; left:0px; width:100%; background: red">
    @foreach ($errors->all() as $erro )
        {{$erro}}
    @endforeach
        {{-- Para acessar as mensagens de feedback de validação:  --}}
    </div>
@endif