@extends('default')

@section('title')
    Delete Requests
@endsection

@section('content')
<table class="table">
    <thead class="table__head">
        <tr>
            <th class="table__row__item">ID</th>
            <th class="table__row__item">PET ID</th>
            <th class="table__row__item">SITTER ID</th>
            <th class="table__row__item">MESSAGE</th>
            <th class="table__row__item">DELETE</th>
        </tr>
    </thead>
    <tbody>
        @foreach($messages as $message)
            <tr class="table__row">
                <td class="table__row__item">{{$message->id}}</td>
                <td class="table__row__item">{{$message->petid}}</td>
                <td class="table__row__item">{{$message->sitterid}}</td>
                <td class="table__row__item">{{$message->message}}</td>
                <td class="table__row__item">
                    <form action="/content-manager/delete" method="POST">
                        @csrf
                        <input type="hidden" value="{{$message->id}}" name="id" id="id">
                        <button name="delete" id="delete" type="submit">DELETE</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection