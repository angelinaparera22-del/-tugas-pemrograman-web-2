<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <form method="POST" action="{{ route('ulasan.store') }}">
        @csrf

        <div class="mb-3">
            <label for="pelanggan_id" class="form-label">Pelanggan ID</label>
            <input type="number" class="form-control @error('pelanggan_id') is-invalid @enderror" id="pelanggan_id"
                name="pelanggan_id" value="{{ old('pelanggan_id') }}">
            @error('pelanggan_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="nama_sepatu" class="form-label">Nama Sepatu</label>
            <input type="text" class="form-control @error('nama_sepatu') is-invalid @enderror" id="nama_sepatu"
                name="nama_sepatu" value="{{ old('nama_sepatu') }}">
            @error('nama_sepatu')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" class="form-control @error('rating') is-invalid @enderror" id="rating"
                name="rating" value="{{ old('rating') }}">
            @error('rating')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="komentar" class="form-label">Komentar</label>
            <textarea class="form-control @error('komentar') is-invalid @enderror" id="komentar" name="komentar">{{ old('komentar') }}</textarea>
            @error('komentar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tanggal_ulasan" class="form-label">Tanggal Ulasan</label>
            <input type="date" class="form-control @error('tanggal_ulasan') is-invalid @enderror" id="tanggal_ulasan"
                name="tanggal_ulasan" value="{{ old('tanggal_ulasan') }}">
            @error('tanggal_ulasan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control @error('status') is-invalid @enderror" id="status"
                name="status" value="{{ old('status') }}">
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <a class="btn btn-warning" href="{{ route('ulasan.index') }}">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-app>
