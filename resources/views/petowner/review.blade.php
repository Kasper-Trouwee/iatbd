@extends('default')

@section('title')
    Review Sitters
@endsection

@section('content')
<article class="review">
    <h1 class="review__title">Place Review</h1>
    @for($i = 0; $i < count($requests); $i++)
        @php
            $indexS = $requests[$i][0]->sitterid -1;
        @endphp
        
        <section class="review__section">
            <h2 class="review__section__title">{{$sitters[$indexS]->name}}</h2>
            <h3 class="review__section__subtitle">{{$pets[$i][0]->kind}} {{$pets[$i][0]->name}}</h3>
            <section class="review__message">
                <h4 class="review__message__title">Message</h4>
                <p class="review__message__message">{{$requests[$i][0]->message}}</p>
            </section>
            <form class="review__forum" action="/review/send" method="POST">
                @csrf
                <h5 class="review__forum__title">Review</h5>
                <input type="hidden" value="{{$requests[$i][0]->id}}" name="id" id="id">
                <input type="hidden" value="{{$user->name}}" name="name" id="name">
                <input type="hidden" value="{{$pets[$i][0]->kind}} {{$pets[$i][0]->name}}" name="pet" id="pet">

                <textarea class="review__forum__input" name="review" id="review" cols="10" rows="10"></textarea>
                
                <button class="review__forum__input u-button" type="submit">Send</button>
            </form>
        </section>
    @endfor
</article>
@endsection