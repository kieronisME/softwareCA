<div>
    <div class="py-5 bg-dark">
        <div class="container-fluid mx-auto">
            <div class="bg-white overflow-hidden shadow-sm rounded">
                <div class="p-4 text-dark">
                    <h3 class="fw-semibold fs-4 mb-4">Add a New wood</h3>
                    <x-pleasework-form :action="route('myRoutes.Woodstore')" method="POST" />
                </div>
            </div>
        </div>
    </div>
</div>