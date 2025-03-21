
@props(['action', 'method', 'CertfiedWoodProducts' => null])

<form action="{{ $action }}" method="POST">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
    @method($method)
    @endif

    <div class="mb-4">
        <label for="Product_name" class="block text-sm text-gray-700">Product_name</label>
        <input type="text" name="Product_name" id="Product_name" value="{{ old('Product_name', $CertfiedWoodProducts->Product_name ?? '') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('Product_name')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    
    <div class="mb-4">
        <label for="Certificate" class="block text-sm text-gray-700">Certificate</label>
        <input type="text" name="Certificate" id="Certificate"
            value="{{ old('Certificate', $CertfiedWoodProducts->Certificate ?? '') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('About')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="Price" class="block text-sm text-gray-700">Price</label>
        <input type="text" name="Price" id="Price"
            value="{{ old('Price', $CertfiedWoodProducts->Price ?? '') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('Price')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>


    <div class="mb-4">
        <label for="About" class="block text-sm text-gray-700">About</label>
        <input type="text" name="About" id="About"
            value="{{ old('About', $CertfiedWoodProducts->About ?? '') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('About')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="quantity" class="block text-sm text-gray-700">quantity</label>
        <input
            type="text"
            name="quantity"
            id="quantity"
            value="{{ old('quantity', $CertfiedWoodProducts->quantity ?? '') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('quantity')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="co2" class="block text-sm text-gray-700">co2</label>
        <input
            type="text"
            name="co2"
            id="co2"
            value="{{ old('co2', $CertfiedWoodProducts->co2 ?? '') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('co2')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="weight" class="block text-sm text-gray-700">weight</label>
        <input
            type="text"
            name="weight"
            id="weight"
            value="{{ old('weight', $CertfiedWoodProducts->weight ?? '') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('weight')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="weight_unit" class="block text-sm text-gray-700">weight_unit</label>
        <input
            type="text"
            name="weight_unit"
            id="weight_unit"
            value="{{ old('weight_unit', $CertfiedWoodProducts->weight_unit ?? '') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('weight_unit')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>



    
    <div>
        <x-primary-button>
        {{ isset($CertfiedWoodProducts) ? 'Update CertfiedWoodProducts' : 'Add CertfiedWoodProducts' }}
        </x-primary-button>
    </div>

    <!-- <input type="hidden" name="_token" value="your-csrf-token-here"> -->
</form>
