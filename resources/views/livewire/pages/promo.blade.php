<div>
    @section('title')
    SurfTicket | Detail Promo
    @endsection

    @section('content')
    @livewire('components.the-header')
    <div class="flex flex-col justify-center items-center w-3/4 mx-auto mt-16">
        <p class="w-full text-2xl text-white bg-green-700 py-2 px-4 rounded-lg font-semibold">Detail Promo</p>
        <div class="flex w-full mt-8">
            <div class="flex justify-center items-center w-1/2 p-6">
                <img src="{{ asset($promo->img_dir) }}" class="rounded-md w-full h-full" alt="">
            </div>
            <div class="flex flex-col justify-center items-start h-full w-1/2 p-6">
                <p class="text-sm">Judul Promo</p>
                <p class="text-xl mb-5">{{ $promo->nama }}</p>
                <p class="text-sm">Kode Promo</p>
                <p class="text-xl mb-5">{{ strtoupper($promo->kode) }}</p>
                <p class="text-sm">Deskripsi</p>
                <p class="text-xl mb-5">{{ $promo->deskripsi }}</p>
                <p class="text-sm">Diskon</p>
                <p class="text-xl mb-5">{{ $promo->diskon }}%</p>
            </div>
        </div>
    </div>
    @endsection

    @include('layouts.footer')
</div>