<div>
    @section('title')
    SurfTicket | Tickets
    @endsection

    @section('content')

    @livewire('components.the-header')

    <div class="px-20 w-full mt-16">
        <h1 class="text-4xl font-semibold text-green-600 mb-8">Tiket Tersedia</h1>
        @livewire('components.list-ticket', ["layout" => "grid"])
    </div>

    @include('layouts.footer')

    @endsection

</div>