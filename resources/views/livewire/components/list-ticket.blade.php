<div>
    @if ($layout == "scroll")
    <div class="overflow-x-auto overflow-y-hidden w-full h-48 mt-10">
        <div class="whitespace-nowrap h-full inline-flex space-x-6">
            @foreach ($tickets as $ticket)
            <a href="/ticket/{{ $ticket['id'] }}"
                class="rounded-md w-80 flex justify-center items-center relative cursor-pointer hover:scale-110 hover:opacity-60 transition transform duration-300 overflow-hidden">
                <img src="{{ $ticket['img_dir'] }}" class="bg-cover w-full h-full" alt="">
                <span class="absolute -bottom-2 text-white w-full h-16 text-center text-lg"
                    style="background-image: url('https://cdn.myanimelist.net/images/image_box_shadow_bottom.png?v=1634263200')">
                    <p>{{$ticket['nama'] }}</p>
                    <p>{{ rand(10, 100) }} tersisa</p>
                </span>
            </a>
            @endforeach
            {{-- {{ $tickets->links() }} --}}
        </div>
    </div>

    @else
    <div class="grid grid-cols-4 gap-8">
        @foreach ($tickets as $ticket)
        <a href="/ticket/{{ $ticket['id'] }}"
            class="rounded-md w-full h-52 flex justify-center items-center relative cursor-pointer hover:scale-105 hover:opacity-60 transition transform duration-300 overflow-hidden">
            <img src="{{ $ticket['img_dir'] }}" class="bg-cover w-full h-full" alt="">
            <span class="absolute -bottom-2 text-white w-full h-1/3 text-center text-lg"
                style="background-image: url('https://cdn.myanimelist.net/images/image_box_shadow_bottom.png?v=1634263200')">
                <p>{{$ticket['nama'] }}</p>
                <p>{{ rand(10, 100) }} tersisa</p>
            </span>
        </a>
        @endforeach
        {{-- {{ $tickets->links() }} --}}
    </div>
    @endif

</div>