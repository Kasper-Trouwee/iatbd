@extends('default')

@section('title')
    Sitters
@endsection

@section('content')
<main class="userIndex">
    <h1 class="userIndex__title">Index Sitters</h1>
    @for($i = 0; $i < count($sitters); $i++)
        <a class="u-a-clean" href="/sitter/{{$sitters[$i]->id}}">
            <section class="userIndex__section">
                <h3 class="userIndex__name">{{$sitters[$i]->name}}</h3>
            </section>
        </a>
    @endfor
</main>
@endsection