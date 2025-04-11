<form action="{{ route('myRoutes.topDogRoutes.topdogSupplierCreate') }}" method="POST" class="main">
    @csrf

    <div class="mainHeader">
        <h3 class="header">
            <i class="bi bi-truck"></i> Supplier Portal Access
        </h3>
        <p class="subtext">Enter your supplier authentication code</p>
        <p class="subtext">the password is lmao</p>
    </div>

    <div class="mb-4">
        <label for="password" class="key">
            <i class="bi bi-key"></i> Supplier Access Code
        </label>
        <div class="iconInput">
            <i class="bi bi-shield-lock"></i>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter supplier code" />
        </div>
        @error('password')
        <div class="error-message">
            <i class="bi bi-exclamation-circle"></i> {{ $message }}
        </div>
        @enderror
    </div>

    <div class="d-grid">
        <button type="submit" class="btn authBtn">
            <i class="bi bi-check-circle"></i> Authenticate
        </button>
    </div>
</form>

<style>
    .main {
        max-width: 500px;
        margin: 0 auto;
        padding: 2rem;
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .mainHeader {
        text-align: center;
        margin-bottom: 2rem;
    }

    .header {
        font-size: 1.5rem;
        color:rgb(17, 125, 233);
        margin-bottom: 0.5rem;
    }

    .subtext {
        color: #7f8c8d;
        font-size: 0.95rem;
    }

    .key {
        font-weight: 500;
        color: #2c3e50;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 0.5rem;
    }

    .iconInput {
        position: relative;
        margin-bottom: 0.5rem;
    }

    .iconInput i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #7f8c8d;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px 12px 45px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        outline: none;
    }

    .error-message {
        color: #e74c3c;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 5px;
        margin-top: 5px;
    }

    .authBtn {
        width: 100%;
        padding: 12px;
        background-color:rgb(138, 224, 240);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .authBtn:hover {
        background-color:rgb(17, 125, 233);
        transform: translateY(-2px);
    }

    @media (max-width: 576px) {
        .main {
            padding: 1.5rem;
        }
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">