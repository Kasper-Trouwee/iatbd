@extends('default')

@section('title')
    {{$pet->kind}} {{$pet->name}}
@endsection

@section('content')
<article class="PetOverview">
    <section class="u-blur PetOverview__img-container">
        <figure class="PetOverview__figure-bg">
            <img class="PetOverview__image-bg" src="{{$pet->image}}" alt="{{$pet->name . $pet->kind}}">
        </figure>
        <figure class="PetOverview__figure u-no-blur">
            <img class="PetOverview__image" src="{{$pet->image}}" alt="{{$pet->name . $pet->kind}}">
        </figure>
    </section>
    <section class="PetOverview__information a-right-to-left">
        <h2 class="PetOverview__title">{{$pet->name}}</h2>
        <p class="PetOverview__description">{{$pet->description}}</p>
    </section>
    <section class="PetOverview__extra-information a-left-to-right">
        <h3 class="PetOverview__subtitle">Extra Information</h3>
        <ul class="PetOverview__info-list">
            <li>Age: {{$pet->age}}</li>
            <li>Price: {{$pet->price}}</li>
            <li>Start Date: {{$pet->startDate}}</li>
            <li>End Date: {{$pet->endDate}}</li>
            <li><button onclick="location.href='/pet/{{$pet->id}}/sit';" class="u-button PetOverview__button">Sit {{$pet->name}}</button></li>
        </ul>
    </section>
</article>
@endsection
