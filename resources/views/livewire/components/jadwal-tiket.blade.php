<div class="w-full h-72 flex justify-center items-start mt-5">
    <div class="w-1/5 h-full p-5">
        <p class="text-xl font-semibold">
            <i class="fas fa-user-friends"></i>
            60 Tiket Tersedia
        </p>
        <p class="text-xl font-semibold">Rp. 100.000,00</p>
    </div>
    <div class="w-4/5 p-5 h-full overflow-auto">
        <div class="container w-full">
            <div class="flex flex-col flex-none">
                <div class="w-full">
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
                                <td class="px-6 py-2">{{ $jw['jam'] }}</td>
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
                </div>
            </div>
        </div>
        <div class="flex justify-between items-center mt-6">
            <p class="text-xl font-semibold w-1/3">Total: Rp. {{ number_format($totalBiaya) }},00</p>
            <div>
                Masukkan kode promo: <input type="text" class="py-1 rounded-md bg-gray-300 pl-2 font-semibold">
                <button class="py-1 px-3 bg-yellow-700 rounded-md text-white text-md hover:opacity-90">Apply</button>
            </div>
            <button class="py-1 px-6 bg-green-700 rounded-md text-white text-md hover:opacity-90">Beli
                Tiket</button>
        </div>
    </div>
</div>