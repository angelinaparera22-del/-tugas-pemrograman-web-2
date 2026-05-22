<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <a class="btn btn-primary mb-3" href="{{ route('pelanggan.create') }}" role="button">Create</a>

    <form action="">

        <div class="row g-3 mb-3">
            <div class="col-md-8">
                <input type="text" class="form-control" id="keyword" name="keyword"
                    placeholder="Search pelanggan name ...."value={{ request('keyword') }}>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </div>


    </form>

    <ul class="list-group">
        @foreach ($pelanggans as $pelanggan)
            <li class="list-group-item fs-7">
                {{ $pelanggans->firstItem() + $loop->index }}.
                {{ $pelanggan->nama_pelanggan }} --
                {{ $pelanggan->alamat }} --
                {{ $pelanggan->nomor_telepon }}

                <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('ANDA YAKIN?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    {{ $pelanggans->links() }}
</x-app>
