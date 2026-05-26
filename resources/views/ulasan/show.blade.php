<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <a href="{{ route('ulasan.index') }}" class="btn btn-secondary mb-3">Back</a>

    <h6>Data Ulasan</h6>
    <ul class="list-group mb-3">
        <li class="list-group-item">Nama Sepatu: {{ $ulasan->nama_sepatu }}</li>
        <li class="list-group-item">Rating: {{ $ulasan->rating }}</li>
        <li class="list-group-item">Komentar: {{ $ulasan->komentar }}</li>
        <li class="list-group-item">Tanggal Ulasan: {{ \Carbon\Carbon::parse($ulasan->tanggal_ulasan)->format('d F Y') }}
        </li>
        <li class="list-group-item">Status: {{ $ulasan->status }}</li>
        <li class="list-group-item">Created At: {{ $ulasan->created_at->format('d F Y H:i:s') }}</li>
        <li class="list-group-item">Last Update: {{ $ulasan->updated_at->diffForHumans() }}</li>
    </ul>

    <h6>Data Pelanggan</h6>
    <ul class="list-group mb-3">
        <li class="list-group-item">Nama: {{ $pelanggan->nama_pelanggan }}</li>
        <li class="list-group-item">Alamat: {{ $pelanggan->alamat }}</li>
        <li class="list-group-item">Nomor Telepon: {{ $pelanggan->nomor_telepon }}</li>
        <li class="list-group-item">Created At: {{ $pelanggan->created_at->format('d F Y H:i:s') }}</li>
        <li class="list-group-item">Last Update: {{ $pelanggan->updated_at->diffForHumans() }}</li>
    </ul>

    <a href="{{ route('ulasan.edit', $ulasan->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('ulasan.destroy', $ulasan->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('ANDA YAKIN?')">Delete</button>
    </form>
</x-app>
