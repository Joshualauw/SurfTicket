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

    @if (Session::has("flash"))
    @livewire('components.the-modal', ["flash" => Session::get('flash')])
    @endif

    @endsection
</div>