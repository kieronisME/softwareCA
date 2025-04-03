<div>
    <x-slot name="header">
        <h2 class="fw-semibold fs-3 text-dark lh-1">
            {{ __('Create New burr') }}
        </h2>
    </x-slot>

    <div class="py-5 bg-dark">
        <div class="container-fluid mx-auto">
            <div class="bg-white overflow-hidden shadow-sm rounded">
                <div class="p-4 text-dark">
                    <h3 class="fw-semibold fs-4 mb-4">YOUR IN THE NOT CCERTIFEID METAL CREATE</h3>
                    <x-pleaseworkNotcert-form :action="route('myRoutes.NWoodstore')" method="POST" />
                </div>
            </div>
        </div>
    </div>
</div>