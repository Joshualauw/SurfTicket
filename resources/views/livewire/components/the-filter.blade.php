<div class="flex justify-center items-center space-x-3 h-full text-md">
    <div>
        <i class="fas fa-search text-green-700 font-semibold"></i>
        <input type="text" class="rounded-lg bg-gray-200 w-56 py-1 px-2" placeholder="Search here.."
            wire:model='searchFilter'>
    </div>
    <p class="text-green-700 font-semibold">Provinsi</p>
    <select name="" id="" class="rounded-lg bg-gray-200 p-1 w-48 overflow-auto" wire:model='provinsiFilter'>
        <option value="all" selected>All</option>
        @foreach ($provinsis as $provinsi)
        <option value="{{ $provinsi->id }}">{{ $provinsi->nama }}</option>
        @endforeach
    </select>
    <p class="text-green-700 font-semibold">Kota</p>
    <select name="" id="" class="rounded-lg bg-gray-200 p-1 w-48 overflow-auto" wire:model='kotaFilter'>
        <option value="all" selected>All</option>
        @foreach ($kotas as $kota)
        <option value="{{ $kota->id }}">{{ $kota->nama }}</option>
        @endforeach
    </select>
</div>