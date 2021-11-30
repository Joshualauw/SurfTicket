<div>
    @if ($layout == "scroll")
    <div class="overflow-x-auto overflow-y-hidden w-full h-48 mt-10">
        <div class="whitespace-nowrap h-full inline-flex space-x-6">
            @foreach ($tickets as $ticket)
            <div
                class="rounded-md w-80 flex justify-center items-center relative cursor-pointer hover:scale-110 hover:opacity-60 transition transform duration-300 overflow-hidden">
                <img src="{{ $ticket['img_dir'] }}" class="bg-cover w-full h-full" alt="">
                <div class="absolute bg-red-600 text-white text-md p-2 top-0 right-0">20%</div>
                <span class="absolute bottom-0 text-white w-full h-12 text-center text-lg"
                    style="background-image: url('https://cdn.myanimelist.net/images/image_box_shadow_bottom.png?v=1634263200')">{{
                    $ticket['nama'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>