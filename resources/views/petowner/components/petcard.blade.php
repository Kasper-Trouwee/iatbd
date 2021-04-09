<li class="petCard__li" data-kind-of-pet={{$pet->kind}}>
    <a class="u-a-clean" href="/pet/{{$pet->id}}">
        <article class="petCard__article">
            <header class="petCard__header">
                <h2 class="petCard__heading">{{$pet->kind}} {{$pet->name}}</h2>
            </header>
            <figure class="petCard__figure">
                <img class="petCard__image" src={{$pet->image}} alt="{{$pet->name . " " . $pet->kind}}">
            </figure>
            <section class="petCard__textSection">
                <ul class="petCard__info">
                    <li>Age: {{$pet->age}}</li>
                    <li>Price: {{$pet->price}}</li>
                    <li>Start Date: {{$pet->startDate}}</li>
                    <li>End Date: {{$pet->endDate}}</li>
                </ul>
                <p class="petCard__text">{{$pet->description}}</p>
            </section>
        </article>
    </a>
</li>