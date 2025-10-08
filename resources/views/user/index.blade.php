@extends('layouts.app')

@section('title', 'Darslar Ro‘yxati')

@section('content')
<h1>Darslar Ro‘yxati</h1>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Foydalanuvchi</th>
        <th>Dars Nomi</th>
        <th>Matn</th>
        <th>Sana</th>
        <th>Soat</th>
    </tr>
    @foreach($lessons as $lesson)
    <tr>
        <td>{{ $lesson->id }}</td>
        <td>{{ $lesson->user->name }}</td>
        <td>{{ $lesson->name }}</td>
        <td>{{ $lesson->text }}</td>
        <td>{{ $lesson->kuni }}</td>
        <td>{{ $lesson->soati }}</td>
    </tr>
    @endforeach
</table>
@endsection
