@extends('default')

@section('title')
    {{$owner->name}} Pets
@endsection

@section('content')
<main class="petCard-container">
    <h1 class="review__title">{{$owner->name}} Pets</h1>
    <ul class="petCard">
        @foreach($pets as $pet)
            @include('petowner.components.petcard')
        @endforeach
    </ul>
</main>
@endsection