<div>
    @section('title')
    SurfTicket | Main
    @endsection

    @section('content')
    @livewire('components.the-header')
    @livewire('components.the-first')
    @livewire('components.sign-up')
    @include('layouts.footer')
    @endsection
</div>