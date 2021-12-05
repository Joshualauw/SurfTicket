<div>
    @section('title')
    SurfTicket | Home
    @endsection

    @section('content')

    @livewire("components.the-header")
    @livewire("components.the-banner")

    {{-- <div class="px-24 w-full mt-28">
        <h1 class="text-4xl font-semibold text-green-600">Tiket Terlaris</h1>
        @livewire('components.list-ticket', ["layout" => "scroll"])
    </div> --}}

    <div class="flex flex-col justify-center items-center w-3/4 mx-auto mt-32">
        <p class="w-full text-2xl text-white bg-green-700 py-2 px-4 rounded-lg font-semibold">Tiket Terbaru</p>
        <div class="w-full mx-auto">
            @livewire('components.list-ticket', ["layout" => "scroll", "data" => "latest"])
        </div>
    </div>

    @include('layouts.footer')
    @if (Session::has("flash"))
    @livewire('components.the-modal', ["flash" => Session::get("flash")])
    @endif
    @endsection
</div>