<x-app>
    <x-slot:title> {{ $title }} </x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-primary mb-3" href="{{ route('pelanggan.create') }}" role="button">CREATE</a>

    <ul class="list-group">
        @foreach ($pelanggans as $pelanggan)
            <li class="list-group-item">
                {{ $loop->iteration }}. {{ $pelanggan->nama_pelanggan }} -- {{ $pelanggan->alamat }} -- {{ $pelanggan->nomor_telepon }}

                <a class="btn btn-info btn-sm" href="{{ route('pelanggan.show', $pelanggan->id) }}" role="button">Detail</a>
                <a class="btn btn-warning btn-sm" href="{{ route('pelanggan.edit', $pelanggan->id) }}" role="button">Edit</a>

                <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Anda Yakin?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-app>
