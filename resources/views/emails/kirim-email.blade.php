@extends('auth.layouts')

@section('header', 'Kirim Email')

@section('content')
    <form action="{{ route('post-email') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nama" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Tujuan</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email Tujuan" required>
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Subjek</label>
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subjek" required>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body Deskripsi</label>
            <textarea name="body" class="form-control" id="body" rows="5" placeholder="Isi pesan" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">Kirim Email</button>
    </form>
@endsection
