@extends('default')

@section('title')
    Requests
@endsection

@section('content')
<article class="request">
    <h1 class="request__title">Requests</h1>
    @for($i = 0; $i < count($requests); $i++)
        <section class="request__section">
            <h2 class="request__subtitle">{{$pets[$i][0]->kind}} {{$pets[$i][0]->name}}</h2>
            <p class="request__message">{{$requests[$i][0]->message}}</p>
            <form class="request__button-container" action="/petowner/accept" method="POST">
                @csrf
                <input type="hidden" value="{{$requests[$i][0]->id}}" name="id" id="id">
                
                <button name="accept" id="accept" value="1" class="request__button" type="submit" data-kind-button=accept>Accept</button>
                <button name="accept" id="accept" value="2" class="request__button" type="submit" data-kind-button=decline>Decline</button>
            </form>
        </section>
    @endfor
</article>
@endsection