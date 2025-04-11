<div class="min-vh-100 d-flex flex-column justify-content-center">
    <x-slot name="header">
        <h2 class="fw-semibold fs-3 text-dark lh-1 text-center">
            {{ __('Create New Supplier Account') }}
        </h2>
    </x-slot>

    <div class="py-5 bg-dark flex-grow-1 d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="bg-white shadow-sm rounded p-4 p-md-5">
                        <h3 class="fw-semibold fs-4 mb-4 text-center">
                            <!-- Type in authentication code to begin sign up for supplier role -->
                            <!-- <span class="badge bg-warning text-dark mt-2">CODE: lmao</span> -->
                        </h3>
                        <x-topDogSupplier-form />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
