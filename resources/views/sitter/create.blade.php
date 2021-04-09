@extends('default')

@section('title')
    {{$pet->name}} {{$pet->kind}}
@endsection

@section('content')
<article class="create-form">
    <form class="create-form__form" action="/pet/{{$pet->id}}/sitting" method="post">
        <h2 class="create-form__title">Sit {{$pet->name}}</h2>
        @csrf

        <section class="create-form__section">
            <label for="message">Message</label>
            <textarea class="create-form__input" name="message" id="message" type="text" rows="4" cols="50"></textarea>
        </section>

        <section class="create-form__section">
            <button class="create-form__input u-button" type="submit">Register Pet</button>
        </section>

        <input type="hidden" name="petid" id="petid" value="{{$pet->id}}"/>
        <input type="hidden" name="sitterid" id="sitterid" value="{{$sitter->id}}"/>
    </form>
</article>

@endsection