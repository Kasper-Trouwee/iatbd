@extends('default')

@section('title', 'Register Pet')

@section('content')
<article class="create-form">
    <form class="create-form__form" action="/petowner/registerd" method="POST" enctype="multipart/form-data">
        <h2 class="create-form__title">Register Pet</h2>
        @csrf

        <section class="create-form__section">
            <label for="name">Name</label>
            <input class="create-form__input" name="name" id="name" type="text" required/>
        </section>

        <section class="create-form__section">
            <label for="kind">Kind</label>
            <select class="create-form__input" name="kind" id="kind" required>
                <option value="Choose Role">Choose Role</option>
                @foreach($kinds_of_pets as $kinds_of_pet)
                    <option value="{{$kinds_of_pet->role}}">{{$kinds_of_pet->role}}</option>
                @endforeach
            </select>
        </section>

        <section class="create-form__section">
            <label for="age">Age</label>
            <input class="create-form__input" name="age" id="age" type="number" step="1" required/>
        </section>

        <section class="create-form__section">
            <label for="description">Description</label>
            <textarea class="create-form__input" name="description" id="description" type="text" rows="4" cols="50"></textarea>
        </section>

        <section class="create-form__section">
            <label for="price">Price</label>
            <input class="create-form__input" name="price" id="price" type="number" step='0.01' required/>
        </section>

        <section class="create-form__section">
            <label for="startDate">Start Date</label>
            <input class="create-form__input" name="startDate" id="startDate" type="date" required/>
        </section>

        <section class="create-form__section">
            <label for="endDate">End Date</label>
            <input class="create-form__input" name="endDate" id="endDate" type="date" required/>
        </section>

        <section class="create-form__section">
            <label for="image">Image</label>
            <input type="file" name="image" id="image"/>
        </section>

        <input type="hidden" name="owner_id" id="owner_id" value="{{$owner->id}}"/>

        <section class="create-form__section">
            <button class="create-form__input u-button" type="submit">Register Pet</button>
        </section>
    </form>
</article>
@endsection
