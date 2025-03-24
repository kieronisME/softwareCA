@props(['action', 'method', 'Admin' => null])
<form method="POST" action="{{ route('myRoutes.topdogStore') }}">
    @csrf

    <!-- Name -->
    <div>
        <x-input-label for="user_name" :value="__('user_name')" />
        <x-text-input id="user_name" class="block mt-1 w-full" type="text" name="user_name" :value="old('user_name')" required
            autofocus autocomplete="user_name" />
        <x-input-error :messages="$errors->get('user_name')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="first_name" :value="__('first_name')" />
        <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')"/>
        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="last_name" :value="__('last_name')" />
        <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"/>
        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <x-input-label for="email" :value="__('email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"/>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="phoneNumber" :value="__('phoneNumber')" />
        <x-text-input id="phoneNumber" class="block mt-1 w-full" type="tel" name="phoneNumber" :value="old('phoneNumber')"/>
        <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('password')" />
        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>







    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            href="{{ route('myRoutes.work') }}">
            {{ __('Already registered?  CHANGGE THIS PATH') }}
        </a>

        <!-- <x-primary-button class="ms-4">
            {{ __('Register') }}
        </x-primary-button> -->
    </div>

    <div>
        <x-primary-button>
            {{ isset($Admin) ? 'register as admin' : 'register as admin' }}
        </x-primary-button>
    </div>

    <div>
        <label for="role" class="block text-sm font-medium text-gray-700">role</label>
        <select id="role" name="role" class="mt-1 block w-full" required>
            <option value="admin" select>admin</option>
        </select>
        @error('role')
        <span class="text-red-500 text-xs mt-12">{{$message}}</span>
        @enderror
    </div>
</form>