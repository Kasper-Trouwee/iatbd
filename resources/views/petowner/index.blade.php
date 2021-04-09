@extends('default')

@section('title')
    Pets
@endsection

@section('content')
<main class="petCard-container">
    <section class="pet-filter">
        <h3>Filter</h3>
        <select class="pet-filter__select" name="kind" id="kind">
            <option class="pet-filter__option" value="All Pets">All Pets</option>
            @foreach($kinds_of_pets as $kind)
                <option class="pet-filter__option" value="{{$kind->role}}">{{$kind->role}}</option>
            @endforeach
        </select>
    </section>
    <ul class="petCard">
        @foreach($pets as $pet)
            @include('petowner.components.petcard')
        @endforeach
    </ul>
</main>
<script src="js/petfilter.js"></script>
@endsection