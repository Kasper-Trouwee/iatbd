@extends('default')

@section('title')
    Edit Profile
@endsection

@section('content')
<article class="create-form">
    <form class="create-form__form" action="/sitter/update" method="post" enctype="multipart/form-data">
        <h2 class="create-form__title">{{$sitter->name}}</h2>
        @csrf

        <section class="create-form__section">
            <label for="message">Image</label>
            <input type="file" name="image" id="image"/>
        </section>

        <section class="create-form__section">
            <button class="create-form__input u-button" type="submit">Register Pet</button>
        </section>

        <input type="hidden" name="sitterid" id="sitterid" value="{{$sitter->id}}"/>
    </form>
</article>

@endsection