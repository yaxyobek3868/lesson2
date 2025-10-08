@extends('layouts.app')

@section('title', 'Foydalanuvchini tahrirlash')

@section('content')
<h2>Foydalanuvchini tahrirlash</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Ism</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
    </div>
    <div class="mb-3">
        <label for="tel" class="form-label">Telefon</label>
        <input type="text" class="form-control" id="tel" name="tel" value="{{ old('tel', $user->tel) }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
    </div>
    <div class="mb-3">
        <label for="manzili" class="form-label">Manzili</label>
        <input type="text" class="form-control" id="manzili" name="manzili" value="{{ old('manzili', $user->manzili) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Yangilash</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Bekor qilish</a>
</form>


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
        <a href="{{ route('users.index') }}" class="btn btn-success">OK</a>
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
