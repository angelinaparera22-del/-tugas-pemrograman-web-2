<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary mb-3">Back</a>

    <h6>Data Pelanggan</h6>
    <ul class="list-group mb-3">
        <li class="list-group-item">Nama: {{ $pelanggan->nama_pelanggan }}</li>
        <li class="list-group-item">Alamat: {{ $pelanggan->alamat }}</li>
        <li class="list-group-item">Nomor Telepon: {{ $pelanggan->nomor_telepon }}</li>
        <li class="list-group-item">Created At: {{ $pelanggan->created_at->format('d F Y H:i:s') }}</li>
        <li class="list-group-item">Last Update: {{ $pelanggan->updated_at->diffForHumans() }}</li>
    </ul>

    <h6>Data Ulasan</h6>
    <ul class="list-group mb-3">
        @forelse($ulasans as $ulasan)
            <li class="list-group-item">
                <div><strong>Nama Sepatu:</strong> {{ $ulasan->nama_sepatu }}</div>
                <div><strong>Rating:</strong> {{ $ulasan->rating }}</div>
                <div><strong>Komentar:</strong> {{ $ulasan->komentar }}</div>
                <div><strong>Tanggal Ulasan:</strong>
                    {{ \Carbon\Carbon::parse($ulasan->tanggal_ulasan)->format('d F Y') }}
                </div>
                <div><strong>Status:</strong> {{ $ulasan->status }}</div>
                <div><strong>Dibuat:</strong> {{ $ulasan->created_at->format('d F Y H:i:s') }}</div>
                <div><strong>Update Terakhir:</strong> {{ $ulasan->updated_at->diffForHumans() }}</div>
            </li>
        @empty
            <li class="list-group-item">Belum ada ulasan</li>
        @endforelse
    </ul>

    <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('ANDA YAKIN?')">Delete</button>
    </form>
</x-app>
