@extends('default')

@section('title')
    Delete Users
@endsection

@section('content')
<table class="table">
    <thead class="table__head">
        <tr>
            <th class="table__row__item">ID</th>
            <th class="table__row__item">NAME</th>
            <th class="table__row__item">EMAIL</th>
            <th class="table__row__item">ROLE</th>
            <th class="table__row__item">BAN USER</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr class="table__row">
                <td class="table__row__item">{{$user->id}}</td>
                <td class="table__row__item">{{$user->name}}</td>
                <td class="table__row__item">{{$user->email}}</td>
                <td class="table__row__item">{{$user->role}}</td>
                <td class="table__row__item">
                    <form action="/content-manager/ban" method="POST">
                        @csrf
                        <input type="hidden" value="{{$user->id}}" name="id" id="id">
                        <button name="ban" id="ban" value="Bannend" type="submit">BAN</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection