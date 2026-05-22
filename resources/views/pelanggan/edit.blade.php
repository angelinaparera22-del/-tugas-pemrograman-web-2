<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <form method="POST" action="{{ route('pelanggan.update', $pelanggan->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" class="form-control @error('nama_pelanggan') is-invalid @enderror"
                value="{{ old('nama_pelanggan', $pelanggan->nama_pelanggan) }}">
            @error('nama_pelanggan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $pelanggan->alamat) }}</textarea>
            @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" class="form-control @error('nomor_telepon') is-invalid @enderror"
                value="{{ old('nomor_telepon', $pelanggan->nomor_telepon) }}">
            @error('nomor_telepon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <a href="{{ route('pelanggan.index') }}" class="btn btn-warning">Cancel</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</x-app>
