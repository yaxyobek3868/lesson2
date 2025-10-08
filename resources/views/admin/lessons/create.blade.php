@extends('layouts.app')

@section('title', 'Yangi dars qo‘shish')

@section('content')
<h2>Yangi dars qo‘shish</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('lessons.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="user_id" class="form-label">Foydalanuvchi</label>
        <select name="user_id" id="user_id" class="form-select" required>
            <option value="">Tanlang</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Dars nomi</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="mb-3">
        <label for="text" class="form-label">Matn</label>
        <textarea name="text" id="text" rows="4" class="form-control" required>{{ old('text') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="kuni" class="form-label">Sana</label>
        <input type="date" name="kuni" id="kuni" class="form-control" value="{{ old('kuni') }}" required>
    </div>

    <div class="mb-3">
        <label for="soati" class="form-label">Soat</label>
        <input type="time" name="soati" id="soati" class="form-control" value="{{ old('soati') }}" required>
    </div>

    <button type="submit" class="btn btn-success">Saqlash</button>
    <a href="{{ route('lessons.index') }}" class="btn btn-secondary">Bekor qilish</a>
</form>


@if(session('success'))
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="successModalLabel">Muvaffaqiyatli!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Yopish"></button>
      </div>
      <div class="modal-body">
        {{ session('success') }}
      </div>
      <div class="modal-footer">
        <a href="{{ route('lessons.index') }}" class="btn btn-success">OK</a>
      </div>
    </div>
  </div>
</div>
@endif
@endsection

@section('scripts')
@if(session('success'))
<script>
    var successModal = new bootstrap.Modal(document.getElementById('successModal'));
    successModal.show();
</script>
@endif
@endsection
