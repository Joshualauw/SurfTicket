<div>
    @section('title')
    SurfTicket | Home
    @endsection

    @section('content')

    @livewire("components.the-header")
    @livewire("components.the-banner")

    <div class="px-16 w-full mt-28">
        <h1 class="text-4xl font-semibold text-green-600">Ticket Promo</h1>
        @livewire('components.list-ticket', ["layout" => "scroll"])
    </div>

    @include('layouts.footer')
</div>

@endsection
</div>