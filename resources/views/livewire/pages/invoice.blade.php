<div>
    @section('title')
    SurfTicket | Invoice
    @endsection

    @section('content')

    @livewire('components.the-header')
    <div class="flex flex-col justify-center items-center w-3/4 mx-auto mt-16">
        @include('invoice', ["ht" => $ht])
    </div>
    @include('layouts.footer')

    @endsection
</div>