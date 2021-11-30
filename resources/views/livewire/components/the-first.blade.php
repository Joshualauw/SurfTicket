<div>
    <div class="flex flex-col justify-center items-center h-full w-1/2 mx-auto mt-12">
        <p wire:click="changeIntro" wire:poll.5000ms="changeIntro" class="text-6xl text-center cursor-pointer">
        Pesan Tiket Liburan dengan <span class="text-green-600">{{ $intro }}</span> di SurfTicket</p>
        <button type="button" class="bg-green-600 hover:bg-green-500 p-3 text-white rounded-lg text-lg mt-10">Pesan Sekarang</button>
    </div>
</div>
