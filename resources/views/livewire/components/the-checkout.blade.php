<div class="flex flex-col space-y-4">
    <table class="w-full text-center my-10">
        <thead>
            <tr class="bg-gray-300 rounded-lg">
                <th class="px-6 py-2">#</th>
                <th class="px-6 py-2">Nama Tiket</th>
                <th class="px-6 py-2">Hari</th>
                <th class="px-6 py-2">Jam Awal</th>
                <th class="px-6 py-2">Jam Akhir</th>
                <th class="px-6 py-2">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwals as $jadwal)
            <tr class="whitespace-nowrap">
                <td>{{ $loop->index }}</td>
                <td>{{ $jadwal["item"]["ticket"]["nama"] }}</td>
                <td>{{ $jadwal["item"]["hari"] }}</td>
                <td>{{ $jadwal["item"]["jam_awal"] }}</td>
                <td>{{ $jadwal["item"]["jam_akhir"] }}</td>
                <td>{{ $jadwal["jumlah"] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex flex-col">
        <div class="flex justify-between">
            <div class="w-1/3 flex space-x-2 justify-start">
                <p class="text-lg text-green-700 {{ $isPromo }}">Total Harga: Rp. {{ number_format($totalHarga)
                    }},00
                </p>
                @if ($totalSetelahDiskon != 0)
                <p class="text-lg text-red-500">Rp. {{ number_format($totalSetelahDiskon) }},00</p>
                @endif
            </div>
            <div class="w-1/3 flex space-x-2 justify-center">
                <p class="text-md">Kode Promo:</p>
                <input type="text" class="rounded-sm bg-gray-300 pl-2 font-semibold" wire:model='kodePromo'>
                <button wire:click='applyPromo'
                    class="bg-yellow-700 px-3 py-1 rounded-sm text-white text-sm hover:opacity-90">Apply</button>
            </div>
            <div class="w-1/3 flex space-x-2 justify-end">
                <p class="text-md">Bukti Transfer:</p>
                <input type="file" class="rounded-sm bg-gray-300 pl-2 font-semibold" wire:model='img_file'>
            </div>
        </div>
        <div class="flex justify-end mt-12">
            <form wire:submit.prevent='checkout' enctype="multipart/form-data">
                <button class="bg-green-600 px-5 py-2 rounded-sm text-white text-md hover:opacity-90"
                    type="submit">Checkout</button>
                <button wire:click='cancel' type="button"
                    class="bg-red-500 px-5 py-2 rounded-sm text-white text-md hover:opacity-90">Batal</button>
            </form>
        </div>
    </div>
    @if (Session::has("flash"))
    @livewire('components.the-modal', ["flash" => Session::get("flash")])
    @endif
</div>
</div>