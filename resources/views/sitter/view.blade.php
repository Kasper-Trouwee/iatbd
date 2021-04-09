@extends('default')

@section('title')
    {{$sitter->name}} Pets
@endsection

@section('content')
<article class="sitter">
    <h2 class="sitter__title">Photo's</h2>
    @for($i = 0; $i < count($files); $i++)
        <figure class="sitter__figure"><img class="sitter__image" src="/{{$files[$i]}}" alt=""></figure>
    @endfor

    <h2 class="sitter__title">Reviews</h2>
    @for($i = 0; $i < count($reviews); $i++)
        <section class="sitter__section">
            <h3 class="sitter__section__title">Owner: {{$reviews[$i][0]->ownername}}</h3>
            <h4 class="sitter__section__subtitle">Pet: {{$reviews[$i][0]->petname}}</h4>
            <p class="sitter__section__text">{{$reviews[$i][0]->review}}</p>
        </section>
    @endfor
</article>

@endsection