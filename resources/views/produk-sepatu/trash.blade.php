<x-app>

    <x-slot:title>{{ $title }}</x-slot>


    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <a class="btn btn-primary mb-3" href="{{ route('produk-sepatu.create') }}" role="button">Create</a>

    <ul class="list-group">
        @foreach ($sepatus as $sepatu)
            <li class="list-group-item fs-7">
                {{ $loop->iteration }}.
                {{ $sepatu->name }} --
                {{ $sepatu->brand }} --
                {{ $sepatu->size }} --
                {{ $sepatu->price }} --
                {{ $sepatu->stock }} --
                {{ $sepatu->deskripsi ?? 'deskripsi' }} {{-- field baru --}}
                </a>
                </form>
                <form action="{{ route('produk-sepatu.restore', $sepatu) }}" method="POST" class="d-inline">
                    @method('PUT')
                    @csrf
                    <button type="submit" class="btn btn-warning btn-sm"
                        onclick="return confirm('ANDA YAKIN ingin mengembalikan data ini?')">Restore</button>
                </form>
                <form action="{{ route('produk-sepatu.force-delete', $sepatu) }}" method="POST" class="d-inline">
                    @method('PUT')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('ANDA YAKIN ingin menghapus data ini secara permanen?')">Force
                        Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

</x-app>
