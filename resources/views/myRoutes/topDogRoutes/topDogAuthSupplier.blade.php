@props(['action', 'method', 'Supplier' => null])
<div class="mainContainer">
    <form method="POST" action="{{ route('myRoutes.topdogStore') }}" class="Supplier-registration-form">
        @csrf

        <div class="SupplierTitleHolder">
            <h2 class="SupplierTitle">
                <i class="bi bi-person-plus-fill"></i> Supplier Registration
            </h2>
            <p class="subtext">Create a new Supplier account</p>
        </div>

       
            <!-- Username -->
            <div class="formMargin">
                <x-input-label for="user_name" :value="__('Username')" />
                <div class="iconInput">
                    <i class="bi bi-person-badge"></i>
                    <x-text-input id="user_name" type="text" name="user_name" :value="old('user_name')" required
                        autofocus autocomplete="username" />
                </div>
                <x-input-error :messages="$errors->get('user_name')" class="Err" />
            </div>

            <!-- First Name -->
            <div class="formMargin">
                <x-input-label for="first_name" :value="__('First Name')" />
                <div class="iconInput">
                    <i class="bi bi-person"></i>
                    <x-text-input id="first_name" type="text" name="first_name" :value="old('first_name')"/>
                </div>
                <x-input-error :messages="$errors->get('first_name')" class="Err" />
            </div>

            <!-- Last Name -->
            <div class="formMargin">
                <x-input-label for="last_name" :value="__('Last Name')" />
                <div class="iconInput">
                    <i class="bi bi-person"></i>
                    <x-text-input id="last_name" type="text" name="last_name" :value="old('last_name')"/>
                </div>
                <x-input-error :messages="$errors->get('last_name')" class="Err" />
            </div>

            <!-- Email -->
            <div class="formMargin">
                <x-input-label for="email" :value="__('Email')" />
                <div class="iconInput">
                    <i class="bi bi-envelope"></i>
                    <x-text-input id="email" type="email" name="email" :value="old('email')"/>
                </div>
                <x-input-error :messages="$errors->get('email')" class="Err" />
            </div>

            <!-- Phone -->
            <div class="formMargin">
                <x-input-label for="phoneNumber" :value="__('Phone Number')" />
                <div class="iconInput">
                    <i class="bi bi-telephone"></i>
                    <x-text-input id="phoneNumber" type="tel" name="phoneNumber" :value="old('phoneNumber')"/>
                </div>
                <x-input-error :messages="$errors->get('phoneNumber')" class="Err" />
            </div>

            <!-- Password -->
            <div class="formMargin">
                <x-input-label for="password" :value="__('Password')" />
                <div class="iconInput">
                    <i class="bi bi-lock"></i>
                    <x-text-input id="password" type="password" name="password" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="Err" />
            </div>


            <input type="hidden" id="role" name="role" value="Supplier">
   
            

        <div class="altFromactions">
            <a href="{{ route('login') }}" class="login">
                <i class="bi bi-box-arrow-in-right"></i> Already registered? Click here
            </a>

            <x-primary-button class="submitBtn">
                <i class="bi bi-shield-check"></i> {{ isset($Supplier) ? 'Register as Supplier' : 'Register as Supplier' }}
            </x-primary-button>
        </div>
    </form>
</div>

<style>
    .mainContainer {
        max-width: 800px;
        margin: 2rem auto;
        padding: 2rem;
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .SupplierTitleHolder {
        text-align: center;
        margin-bottom: 2rem;
    }

    .SupplierTitle {
        font-size: 1.75rem;
        color:rgb(17, 125, 233);
        margin-bottom: 0.5rem;
    }

    .subtext {
        color: #7f8c8d;
        font-size: 1rem;
    }


    .formMargin {
        margin-bottom: 1rem;
    }

    .iconInput {
        position: relative;
        display: flex;
        align-items: center;
    }

    .iconInput i {
        position: absolute;
        left: 12px;
        color: #7f8c8d;
        
    }


    .iconInput input {
        padding-left: 40px !important;
        width: 100%;
        height: 45px;
        border: 1px solid blue;
        border-radius: 6px;
        transition: all 0.3s;
    }


    .Err {
        color: #e74c3c;
        font-size: 0.85rem;
        margin-top: 5px;
    }

    .altFromactions {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
        margin-top: 2rem;
    }

    .login {
        color:rgb(17, 125, 233);
        text-decoration: none;
        font-size: 0.95rem;
        transition: color 0.3s;
    }

    .login:hover {
        color:rgb(17, 125, 233);
        text-decoration: underline;
    }

    .submitBtn {
        background-color:rgb(159, 196, 233);
        border: none;
        border-radius: 10px;
        padding: 12px 24px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .submitBtn:hover {
        background-color:rgb(17, 125, 233);
        transform: translateY(-2px);
    }


</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<!-- 
<form method="POST" action="{{ route('myRoutes.topdogSuplierStore') }}">
    @csrf
<!--  -->