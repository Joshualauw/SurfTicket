<div
    class="flex justify-center items-center h-72 w-3/4 mt-20 mx-auto border-2 border-green-800 bg-green-600 rounded-lg relative">
    <div wire:click="swipeLeft"
        class="absolute top-1/2 -left-8 transition duration-200 ease-in-out transform hover:-translate-y-1 hover:scale-110">
        <i class="fas fa-chevron-left cursor-pointer text-3xl"></i>
    </div>
    <div wire:click="swipeRight" wire:poll.5000ms="swipeRight"
        class="absolute top-1/2 -right-8 transition duration-200 ease-in-out transform hover:-translate-y-1 hover:scale-110">
        <i class="fas fa-chevron-right cursor-pointer text-3xl"></i>
    </div>
    <img src="{{ $img1 }}" class="object-cover object-right overflow-hidden h-full w-1/5" alt="">
    <img src="{{ $img2 }}" class="object-cover overflow-hidden border-2 border-green-800 w-3/5" alt="">
    <img src="{{ $img3 }}" class="object-cover object-left overflow-hidden h-full w-1/5" alt="">
</div>