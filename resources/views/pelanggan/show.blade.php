<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <h6>Data Pelanggan</h6>
    <ul class="list-group mb-3">
        <li class="list-group-item">Nama: {{ $pelanggan->nama_pelanggan }}</li>
        <li class="list-group-item">Alamat: {{ $pelanggan->alamat }}</li>
        <li class="list-group-item">Nomor Telepon: {{ $pelanggan->nomor_telepon }}</li>
        <li class="list-group-item">
            Created At: {{ $pelanggan->created_at->format('d F Y H:i:s') }}
        </li>
        <li class="list-group-item">
            Last Update: {{ $pelanggan->updated_at->diffForHumans() }}
        </li>
    </ul>

    <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Cancel</a>
    <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('ANDA YAKIN?')">Delete</button>
    </form>
</x-app>
