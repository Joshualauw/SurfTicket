<div>
    @section('title')
    SurfTicket | Detail Tiket
    @endsection

    @section('content')
    @livewire('components.the-header')

    <div class="flex flex-col justify-center items-center w-3/4 mx-auto mt-16">
        <p class="w-full text-2xl text-white bg-green-700 py-2 px-4 rounded-full font-semibold">Detail Tiket</p>
        <div class="flex justify-center items-center h-72 w-full my-10">
            <img src="{{ $ticket['img_dir'] }}" class="bg-cover rounded-md w-2/5 h-full" alt="">
            <div class="w-3/5 h-full pl-6 overflow-auto">
                <p class="w-full text-2xl font-semibold">{{ $ticket['nama'] }}</p>
                <p class="w-full text-lg mt-2">{{ $ticket['deskripsi'] }}</p>
                <p class="w-full text-lg mt-2">Provinsi: {{ $ticket->kota->provinsi["nama"] }}</p>
                <p class="w-full text-lg mt-2">Kota: {{ $ticket->kota["nama"] }}</p>
            </div>
        </div>
        <p class="w-full text-2xl text-white bg-green-700 py-2 px-4 rounded-full font-semibold">Jadwal Tiket</p>

        @livewire('components.jadwal-tiket', ["ticket" => $ticket])
    </div>

    @include('layouts.footer')
    @endsection
</div>