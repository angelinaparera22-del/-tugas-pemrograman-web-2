<x-app>
    <x-slot:title>{{ $title }}</x-slot>
    <x-slot:title> {{ $title }} </x-slot>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            @session('success')
                <div class="alert alert-success">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
        @endif
    @endsession

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

        <ul class="list-group">
            @foreach ($pelanggans as $pelanggan)
                <li class="list-group-item">
                    {{ $pelanggans->firstItem() + $loop->index }}.
                    {{ $pelanggan->nama_pelanggan }} --
                    {{ $pelanggan->alamat }} --
                    {{ $pelanggan->nomor_telepon }}

                    <a class="btn btn-info btn-sm" href="{{ route('pelanggan.show', $pelanggan->id) }}"
                        role="button">Detail</a>
                    <a class="btn btn-warning btn-sm" href="{{ route('pelanggan.edit', $pelanggan->id) }}"
                        role="button">Edit</a>

                    <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Anda Yakin?')">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>

        {{ $pelanggans->links() }}
</x-app>
