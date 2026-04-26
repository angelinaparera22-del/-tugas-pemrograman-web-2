<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <form method="POST" action="{{ route('produk-sepatu.store') }}">
        @csrf

        <!-- NAME -->
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- BRAND -->
        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand"
                name="brand" value="{{ old('brand') }}">
            @error('brand')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- SIZE -->
        <div class="mb-3">
            <label for="size" class="form-label">Size</label>
            <input type="number" class="form-control @error('size') is-invalid @enderror" id="size" name="size"
                value="{{ old('size') }}">
            @error('size')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- PRICE -->
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                name="price" value="{{ old('price') }}">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- STOCK -->
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock"
                name="stock" value="{{ old('stock') }}">
            @error('stock')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- BUTTON -->
        <a class="btn btn-warning" href="{{ route('produk-sepatu.index') }}">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</x-app>
