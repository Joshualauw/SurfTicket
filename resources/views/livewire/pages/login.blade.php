<div>
    @section('title')
    SurfTicket | Login
    @endsection

    @section('content')
    @livewire('components.the-header')
    <div class="flex flex-col justify-center items-center w-1/4 mx-auto py-4 rounded-md mt-20 bg-green-600 text-white">

        <h1 class="text-3xl text-white mb-2 pb-2 border-b-2 border-green-200">Login</h1>

        <form action="" class="flex flex-col w-full px-6 justify-center items-start text-black text-md">
            <label for="username" class="text-white">Username</label>
            <input type="text" class="pl-1 rounded-md w-full" name="username">

            <label for="password" class="text-white">Password</label>
            <input type="password" class="pl-1 rounded-md w-full" name="password">

            <button type="button"
                class="bg-green-800 hover:bg-green-400 w-1/2 mx-auto px-2 py-1 text-white rounded-md text-lg mt-5">Login</button>
        </form>
    </div>
    @endsection
</div>