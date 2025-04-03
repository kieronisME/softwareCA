<form action="{{ route('topDogRoutes.create.Admin') }}" method="GET">
    @csrf

    <div class="mb-4">
        <label for="password" class="block text-sm text-gray-700">ADMIN Password</label>
        <input type="text" name="password" id="password"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('password')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <x-primary-button>
            Authenticate
        </x-primary-button>
    </div>
</form>