<div>
    @section('title')
    SurfTicket | Tickets
    @endsection

    @section('content')

    @livewire('components.the-header')

    <div class="flex flex-col justify-center items-center w-3/4 mx-auto mt-16">
        <p class="w-full text-2xl text-white bg-green-700 py-2 px-4 rounded-lg font-semibold">Tiket Tersedia</p>
        @livewire('components.the-filter')
        @livewire('components.list-ticket', ["layout" => "grid", "data" => "all"])
    </div>

    @include('layouts.footer')
    @endsection
</div>