<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <form method="POST" action="{{ route('produk-sepatu.update', $sepatu) }}">
        @csrf
        @method('PUT')


        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $sepatu->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label>Brand</label>
            <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror"
                value="{{ old('brand', $sepatu->brand) }}">
            @error('brand')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label>Size</label>
            <input type="number" name="size" class="form-control @error('size') is-invalid @enderror"
                value="{{ old('size', $sepatu->size) }}">
            @error('size')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                value="{{ old('price', $sepatu->price) }}">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror"
                value="{{ old('stock', $sepatu->stock) }}">
            @error('stock')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <a href="{{ route('produk-sepatu.index') }}" class="btn btn-warning">Cancel</a>
        <button type="submit" class="btn btn-primary">Update</button>

    </form>

</x-app>
