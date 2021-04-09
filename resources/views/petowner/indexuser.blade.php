@extends('default')

@section('title')
    Pet Owners
@endsection

@section('content')
<main class="userIndex">
    <h1 class="userIndex__title">Index Pet Owners</h1>
    @for($i = 0; $i < count($petowners); $i++)
        <a class="u-a-clean" href="/petowner/{{$petowners[$i]->id}}">
            <section class="userIndex__section">
                <h3 class="userIndex__name">{{$petowners[$i]->name}}</h3>
            </section>
        </a>
    @endfor
</main>
@endsection