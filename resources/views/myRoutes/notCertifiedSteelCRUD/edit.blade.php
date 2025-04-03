
    <div class="relative py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black opacity-75 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
                    <h3 class="font-semibold text-lg mb-4">YOU ARE IN NOT CERT STEEEEEEL PROUCT EDIT: {{ $notCertfiedSteelProducts->Product_name }}</h3>
                    <x-pleaseworkNotcert-form
                        :action="route('crud.NSteelupdate',  $notCertfiedSteelProducts->id)" 
                        method="PUT" 
                        :notCertfiedSteelProducts="$notCertfiedSteelProducts"
                    />
                </div>
            </div>
        </div>
    </div>
