<div>
    @section('title')
    SurfTicket | Home
    @endsection

    @section('content')

    @livewire("components.the-header")
    @livewire("components.the-banner")

    <div class="px-20 w-full mt-28">
        <h1 class="text-4xl font-semibold text-green-600">Tiket Promo</h1>
        @livewire('components.list-ticket', ["layout" => "scroll"])
    </div>

    @include('layouts.footer')
</div>

@endsection
</div>