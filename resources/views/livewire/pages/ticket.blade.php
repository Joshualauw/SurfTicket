<div>
    @section('title')
    SurfTicket | Detail Tiket
    @endsection

    @section('content')
    @livewire('components.the-header')

    <div class="flex flex-col justify-center items-center w-3/4 mx-auto mt-16">
        <p class="w-full text-2xl text-white bg-green-700 py-2 px-4 rounded-lg font-semibold">Detail Wisata</p>
        <div class="flex justify-center items-center h-72 w-full my-10">
            <img src="{{ $ticket['img_dir'] }}" class="bg-cover rounded-md w-2/5 h-full" alt="">
            <div class="w-3/5 h-full pl-6 overflow-auto">
                <p class="text-3xl font-semibold pb-3 border-b-2 border-gray-300 mb-5">{{ $ticket['nama'] }}</p>
                <p class="text-sm">Deskripsi:</p>
                <p class="text-lg mb-2">{{ $ticket['deskripsi'] }}</p>
                <p class="text-sm">Provinsi:</p>
                <p class="text-lg mb-2">{{ $ticket->kota->provinsi["nama"] }}</p>
                <p class="text-sm">Kota:</p>
                <p class="text-lg mb-2">{{ $ticket->kota["nama"] }}</p>
            </div>
        </div>
        <p class="w-full text-2xl text-white bg-green-700 py-2 px-4 rounded-lg font-semibold">Jadwal Tiket</p>
        @livewire('components.jadwal-tiket', ["ticket" => $ticket])

        <p class="w-full text-2xl text-white bg-green-700 py-2 px-4 rounded-lg font-semibold">Reviews</p>
        @livewire('components.the-review', ["reviews" => $ticket->review])

        <div class="w-full mx-auto mt-8">
            <h1 class="text-3xl font-semibold text-green-600">Tiket Lainnya</h1>
            @livewire('components.list-ticket', ["layout" => "random"])
        </div>

    </div>

    @include('layouts.footer')
    @endsection
</div>