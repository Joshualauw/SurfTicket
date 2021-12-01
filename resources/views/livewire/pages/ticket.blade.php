<div>
    @section('title')
    SurfTicket | Detail Tiket
    @endsection

    @section('content')
    @livewire('components.the-header')

    <div class="flex flex-col justify-center items-center w-3/4 mx-auto mt-16">
        <p class="w-full text-2xl text-white bg-green-600 p-2 rounded-md font-semibold">Detail Tiket</p>
        <div class="flex justify-center items-center h-72 w-full my-10">
            <img src="{{ $ticket['img_dir'] }}" class="bg-cover w-2/5 h-full" alt="">
            <div class="w-3/5 h-full pl-4 overflow-auto">
                <p class="w-full text-2xl font-semibold">Inazuma City</p>
                <p class="w-full text-lg mt-2">{{ $ticket['deskripsi'] }}</p>
                <p class="w-full text-lg mt-2">Provinsi: {{ $ticket['provinsi'] }}</p>
                <p class="w-full text-lg mt-2">Kota: {{ $ticket['kota'] }}</p>
                <p class="w-full text-lg mt-2">Kecamatan: {{ $ticket['kecamatan'] }}</p>
            </div>
        </div>
        <p class="w-full text-2xl text-white bg-green-600 p-2 rounded-md font-semibold">Jadwal Tiket</p>
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
                    <div class="flex flex-col">
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
                                            <button wire:click='decKuota({{ $loop->index }})'
                                                class="bg-green-600 text-white px-2 rounded-md font-semibold">-</button>
                                            <p>{{ $buyTickets[$loop->index] }}</p>
                                            <button wire:click="incKuota({{ $loop->index }})"
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
                    <p class="text-xl font-semibold">Total: Rp. 100.000,00</p>
                    <div>
                        Masukkan kode promo: <input type="text" class="py-1 rounded-md bg-gray-300 pl-2 font-semibold">
                        <button
                            class="py-1 px-3 bg-yellow-700 rounded-md text-white text-md hover:opacity-90">Apply</button>
                    </div>
                    <button class="py-1 px-6 bg-green-700 rounded-md text-white text-md hover:opacity-90">Beli
                        Tiket</button>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
    @endsection
</div>