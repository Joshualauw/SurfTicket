<div
    class="flex justify-center items-center h-64 w-3/4 mt-20 mx-auto border-2 border-green-800 bg-green-600 rounded-lg relative">
    <div wire:click="swipeLeft"
        class="absolute top-1/2 -left-8 transition duration-200 ease-in-out transform hover:-translate-y-1 hover:scale-110">
        <i class="fas fa-chevron-left cursor-pointer text-3xl"></i>
    </div>
    <div wire:click="swipeRight" wire:poll.5000ms="swipeRight"
        class="absolute top-1/2 -right-8 transition duration-200 ease-in-out transform hover:-translate-y-1 hover:scale-110">
        <i class="fas fa-chevron-right cursor-pointer text-3xl"></i>
    </div>
    <div class="overflow-hidden h-full w-1/5 cursor-pointer">
        <img src="{{ $img1 }}" class="object-cover object-right w-full h-full" alt="">
    </div>
    <div class="relative h-80 border-2 border-green-600 w-3/5 cursor-pointer">
        <div class="absolute -right-0.5 -top-0.5 bg-red-600 p-3 text-white text-lg rounded-bl-sm">SURFTICKETMANTAP 50%!
        </div>
        <img src="{{ $img2 }}" class="w-full h-full" alt="">
    </div>
    <div class="h-full overflow-hidden w-1/5 cursor-pointer">
        <img src="{{ $img3 }}" class="object-cover object-left w-full h-full" alt="">
    </div>
</div>