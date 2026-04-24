<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <ul class="list-group">
        @foreach ($sepatus as $sepatu)
            <li class="list-group-item fs-7">{{ $loop->iteration }}. {{ $sepatu->size }}. {{ $sepatu->stock }}.
                {{ $sepatu->price }}. {{ $sepatu->brand }}. {{ $sepatu->name }}</li>
        @endforeach
    </ul>
</x-app>
