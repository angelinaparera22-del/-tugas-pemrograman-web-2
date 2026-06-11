<x-app>
    <x-slot:title> {{ $title }} </x-slot>

    @session('success')
        <div class="alert alert-success mb-2">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-primary mb-2" href="{{ route('ulasan.create') }}" role="button">CREATE</a>

    <form action="" method="GET">
        <div class="row g-2 mb-2">
            <div class="col-md-4">
                <input type="text" class="form-control form-control-sm" id="keyword" name="keyword"
                    placeholder="Search ulasan / pelanggan ..." value="{{ request('keyword') }}">
            </div>
            <div class="col-md-4">
                <select class="form-select form-select-sm" id="nama_sepatu" name="nama_sepatu">
                    <option value="">All Sepatu</option>
                    <option value="Nike" {{ request('nama_sepatu') == 'Nike' ? 'selected' : '' }}>Nike</option>
                    <option value="Adidas" {{ request('nama_sepatu') == 'Adidas' ? 'selected' : '' }}>Adidas</option>
                    <option value="Puma" {{ request('nama_sepatu') == 'Puma' ? 'selected' : '' }}>Puma</option>
                    <option value="Reebok" {{ request('nama_sepatu') == 'Reebok' ? 'selected' : '' }}>Reebok</option>
                    <option value="Vans" {{ request('nama_sepatu') == 'Vans' ? 'selected' : '' }}>Vans</option>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </div>
    </form>

    <ul class="list-group list-group-sm">
        @foreach ($ulasans as $ulasan)
            <li class="list-group-item" style="font-size: 14px;">
                {{ $ulasans->firstItem() + $loop->index }}. Nama Sepatu: {{ $ulasan->nama_sepatu }}
                - {{ $ulasan->rating }}
                - {{ $ulasan->komentar }}
                - {{ $ulasan->tanggal_ulasan }}
                - {{ $ulasan->status }}
                - Pelanggan: {{ $ulasan->pelanggan->nama_pelanggan ?? '-' }}

                <a class="btn btn-info btn-sm" href="{{ route('ulasan.show', $ulasan->id) }}">Detail</a>
                <a class="btn btn-warning btn-sm" href="{{ route('ulasan.edit', $ulasan->id) }}">Edit</a>
                <form action="{{ route('ulasan.destroy', $ulasan->id) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Anda Yakin?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    {{ $ulasans->links() }}
</x-app>
