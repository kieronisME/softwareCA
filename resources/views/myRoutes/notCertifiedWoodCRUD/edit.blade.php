
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Update Album') }}
        </h2>
    </x-slot>

    <div class="relative">
        <video autoplay loop muted class="fixed top-0 left-0 w-full h-full object-cover z-0">
            <source src="{{ asset('ArtistImg/vid/lucki.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="absolute inset-0 bg-black opacity-50 z-10"></div> 
    </div>

    <div class="relative py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black opacity-75 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
                    <h3 class="font-semibold text-lg mb-4">YOU ARE IN NOT CERT WOOD PROUCT EDIT: {{ $notCertfiedWoodProducts->Product_name }}</h3>
                    <x-pleaseworkNotcert-form
                        :action="route('crud.Nupdate',  $notCertfiedWoodProducts->id)" 
                        method="PUT" 
                        :notCertfiedWoodProducts="$notCertfiedWoodProducts"
                    />
                </div>
            </div>
        </div>
    </div>
