<div class="h-screen" wire:poll.9000ms='swapBackground'
    style="background: url({{ $backgroundImage }}) no-repeat; background-size: cover">

    <div class="flex flex-col justify-center items-center h-full w-3/4 mx-auto">
        <p wire:click="changeIntro" wire:poll.5000ms="changeIntro"
            class="text-6xl text-gray-50 text-center font-semibold cursor-pointer">
            Mau Pesan Tiket Liburan dengan <span class="text-green-100">{{ $intro }}</span> Yuk Pesan di SurfTicket!
        </p>
        <button type="button" class="bg-green-700 hover:bg-green-500 py-3 px-10 text-white rounded-lg text-lg mt-10">
            <a href="/home">Cari Tiket</a>
        </button>
    </div>
</div>