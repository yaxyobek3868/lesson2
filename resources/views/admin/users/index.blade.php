@extends('layouts.app')

@section('title', 'Foydalanuvchilar ro‘yxati')

@section('content')

@if(session('success'))

<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="successModalLabel">Muvaffaqiyatli</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Yopish"></button>
      </div>
      <div class="modal-body">
        {{ session('success') }}
      </div>
    </div>
  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
    });
</script>
@endif

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Foydalanuvchilar</h2>
    <a href="{{ route('users.create') }}" class="btn btn-primary">Yangi foydalanuvchi qo‘shish</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Ism</th>
            <th>Telefon</th>
            <th>Email</th>
            <th>Manzili</th>
            <th>Amallar</th>
        </tr>
    </thead>
    <tbody>
        @forelse($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->tel }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->manzili }}</td>
            <td>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Tahrirlash</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Haqiqatan ham o‘chirmoqchimisiz?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">O‘chirish</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center">Foydalanuvchilar mavjud emas</td></tr>
        @endforelse
    </tbody>
</table>

@endsection
