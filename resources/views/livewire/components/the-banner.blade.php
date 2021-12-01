<div class="flex justify-center items-center h-64 w-3/4 mt-20 mx-auto bg-gray-300 rounded-lg relative">
    <div wire:click="swipeLeft" class="absolute top-1/2 -left-8">
        <i class="fas fa-chevron-left cursor-pointer text-3xl"></i>
    </div>
    <div wire:click="swipeRight" wire:poll.5000ms="swipeRight" class="absolute top-1/2 -right-8">
        <i class="fas fa-chevron-right cursor-pointer text-3xl"></i>
    </div>
    <div class="overflow-hidden h-full w-1/5 cursor-pointer">
        <img src="{{ $img1 }}" class="object-cover object-right w-full h-full" alt="">
    </div>
    <div class="relative h-80 w-3/5 cursor-pointer">
        {{-- <div class="absolute -right-0.5 -top-0.5 bg-red-600 p-3 text-white text-lg rounded-bl-sm">SURFTICKETMANTAP
            50%!
        </div> --}}
        <img src="{{ $img2 }}" class="w-full h-full" alt="">
    </div>
    <div class="h-full overflow-hidden w-1/5 cursor-pointer">
        <img src="{{ $img3 }}" class="object-cover object-left w-full h-full" alt="">
    </div>
</div>