<div>
    @section('title')
    SurfTicket | Tickets
    @endsection

    @section('content')

    @livewire('components.the-header')

    <div class="px-24 w-full mt-16">
        <div class="flex justify-between items-center h-full mb-10">
            <h1 class="text-4xl font-semibold text-green-600">Tiket Tersedia</h1>
            @livewire('components.the-filter')
        </div>
        @livewire('components.list-ticket', ["layout" => "grid"])
    </div>

    @include('layouts.footer')

    @endsection

</div>