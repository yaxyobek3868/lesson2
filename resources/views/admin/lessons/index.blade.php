@extends('layouts.app')

@section('title', 'Darslar ro‘yxati')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Darslar</h2>
    <a href="{{ route('lessons.create') }}" class="btn btn-primary">Yangi dars qo‘shish</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Foydalanuvchi</th>
            <th>Dars nomi</th>
            <th>Matn</th>
            <th>Sana</th>
            <th>Soat</th>
            <th>Amallar</th>
        </tr>
    </thead>
    <tbody>
        @forelse($lessons as $lesson)
        <tr>
            <td>{{ $lesson->id }}</td>
            <td>{{ $lesson->user->name }}</td>
            <td>{{ $lesson->name }}</td>
            <td>{{ Str::limit($lesson->text, 50) }}</td>
            <td>{{ $lesson->kuni }}</td>
            <td>{{ $lesson->soati }}</td>
            <td>
                <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-sm btn-warning">Tahrirlash</a>
                <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Haqiqatan ham o‘chirmoqchimisiz?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">O‘chirish</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="7" class="text-center">Darslar mavjud emas</td></tr>
        @endforelse
    </tbody>
</table>


@if(session('success'))
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="successModalLabel">Muvaffaqiyat!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Yopish"></button>
      </div>
      <div class="modal-body">
        {{ session('success') }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Yopish</button>
      </div>
    </div>
  </div>
</div>
@endif

@endsection

@section('scripts')
@if(session('success'))
<script>
    var myModal = new bootstrap.Modal(document.getElementById('successModal'));
    myModal.show();
</script>
@endif
@endsection
