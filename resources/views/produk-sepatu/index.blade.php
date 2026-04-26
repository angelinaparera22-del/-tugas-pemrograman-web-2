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
                {{ $sepatu->stock }}
                <a href="{{ route('produk-sepatu.edit', $sepatu) }}" class="btn btn-warning">
                    Edit
                </a>
            </li>
        @endforeach
    </ul>

</x-app>
