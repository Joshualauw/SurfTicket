<div>
    @section('title')
    SurfTicket | Main
    @endsection

    @section('content')
    @livewire('components.the-header')
    @livewire('components.the-first')

    @guest
    @livewire('components.sign-up')
    @endguest

    @include('layouts.footer')

    @endsection
</div>