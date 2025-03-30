<div class="relative py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-black opacity-75 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-black">
                <h3 class="font-semibold text-lg mb-4">You are updating teh product: {{ $certifiedMetalProducts->Product_name }}</h3>
                <x-pleasework-form
                    :action="route('crud.Metalupdate',  $certifiedMetalProducts->id)"
                    method="PUT"
                    :certifiedMetalProducts="$certifiedMetalProducts" />
            </div>
        </div>
    </div>
</div>