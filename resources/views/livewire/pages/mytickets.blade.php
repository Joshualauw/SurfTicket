<div>
    @section('title')
    SurfTicket | My Tickets
    @endsection

    @section('content')
    @livewire('components.the-header')

    <div class="flex flex-col justify-center items-center w-3/4 mx-auto mt-16">
        <p class="w-full text-2xl text-white bg-green-700 py-2 px-4 rounded-lg font-semibold">My Tickets</p>
        <div class="grid grid-cols-4 gap-8 mt-12">
            @foreach ($htrans as $h)
            <div class="flex flex-col justify-start items-center space-y-2 h-60">
                <a href="/ticket/{{ $h->ticket->id }}"
                    class="w-full {{ $h->status == "dikonfirmasi" ? "h-52" : "h-full" }} flex justify-center items-center relative cursor-pointer hover:opacity-80 transition transform duration-300 overflow-hidden">
                    <img src="{{ asset($h->ticket->img_dir) }}" class="bg-cover w-full h-full" alt="">
                    <span class="absolute {{ $h->status == "dikonfirmasi" ? "-bottom-3" : "-bottom-5" }} text-white w-full h-1/3 text-center text-lg"
                        style="background-image: url('https://cdn.myanimelist.net/images/image_box_shadow_bottom.png?v=1634263200')">
                        <p>{{ $h->ticket->nama }}</p>
                        <p class="@if($h->status=="menunggu") text-yellow-400 @elseif($h->status == "dikonfirmasi")
                            text-green-400
                            @else text-red-500 @endif">
                            {{ $h->status }}
                        </p>
                    </span>
                    @if ($h->status == "dikonfirmasi")
                    <a href="/invoice/{{ $h->id }}" class="w-full">
                        <button class="py-1 px-3 hover:opacity-90 bg-green-700 text-white text-md w-full">Detail Pembelian</button>
                    </a>
                    @endif
                </a>
            </div>
            @endforeach
        </div>
    </div>

    @include('layouts.footer')
    @endsection
</div>
