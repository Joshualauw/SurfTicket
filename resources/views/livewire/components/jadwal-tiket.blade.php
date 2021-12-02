<div class="w-full h-72 flex justify-center items-start mt-5">
    <div class="w-3/5 h-full p-5">
        <div class="container w-full h-full overflow-auto">
            <div class="flex flex-col flex-none">
                <div class="w-full">
                    @if ($totalJadwal == 0)
                    <div class="flex flex-col justify-center items-center">
                        <p class="text-lg text-center mt-4">Maaf, Belum ada Jadwal Tersedia</p>
                        <i class="far fa-times-circle text-gray-400 text-8xl mt-6 text-center"></i>
                    </div>
                    @else
                    <table class="w-full text-center">
                        <thead>
                            <tr class="bg-gray-300 rounded-lg">
                                <th class="px-6 py-2">#</th>
                                <th class="px-6 py-2">Hari</th>
                                <th class="px-6 py-2">Jam</th>
                                <th class="px-6 py-2">Kuota</th>
                                <th class="px-6 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal as $jw)
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-2">{{ $loop->index+1 }}</td>
                                <td class="px-6 py-2">{{ $jw['hari'] }}</td>
                                <td class="px-6 py-2">{{ $jw['jam_awal'] }} - {{ $jw["jam_akhir"] }}</td>
                                <td class="px-6 py-2">{{ $jw['kuota'] }}</td>
                                <td class="flex justify-center space-x-3 px-6 py-2">
                                    <button wire:click='decrementKuota({{ $loop->index }})'
                                        class="bg-green-600 text-white px-2 rounded-md font-semibold">-</button>
                                    <p>{{ $buyTickets[$loop->index] }}</p>
                                    <button wire:click='incrementKuota({{ $loop->index }})'
                                        class="bg-green-600 text-white px-2 rounded-md font-semibold">+</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col w-2/5 p-5 space-y-3 h-full">
        <div class="flex">
            <div class="w-1/2">
                <p class="text-sm">Sisa Tiket:</p>
                <p class="text-lg font-semibold mb-4"><i class="fas fa-user-friends"></i> {{ $totalTicket }}</p>
                <p class="text-sm">Harga Tiket:</p>
                <p class="text-lg font-semibold mb-4">Rp. {{ number_format($hargaTiket) }}</p>
            </div>
            <div class="w-1/2">
                <p class="text-sm">Jadwal Tersedia:</p>
                <p class="text-lg font-semibold mb-4"><i class="fas fa-calendar-check"></i> {{ $totalJadwal }}</p>
                <p class="text-sm">Kode Promo:</p>
                <div class="flex space-x-1 mb-4 text-lg">
                    <input type="text" class="rounded-md bg-gray-300 pl-2 font-semibold w-4/5">
                    <button class="bg-yellow-700 rounded-md text-white w-1/5 text-sm hover:opacity-90">Add</button>
                </div>
            </div>
        </div>
        <p class="text-xl text-green-700 font-semibold mb-4">Total: Rp. {{ number_format($totalBiaya) }},00</p>
        <button class="py-1 px-6 bg-green-700 rounded-lg text-white text-md hover:opacity-90">Beli</button>
    </div>
</div>