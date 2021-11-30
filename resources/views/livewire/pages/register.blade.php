<div>
  @section('title')
  SurfTicket | Register
  @endsection

  @section('content')
  @livewire('components.the-header')
  <div class="flex flex-col justify-center items-center w-1/4 mx-auto py-4 rounded-md mt-20 bg-green-600 text-white">

    <h1 class="text-3xl text-white mb-2 pb-2 border-b-2 border-green-200">Register</h1>

    <form wire:submit.prevent='registerUser'
      class="flex flex-col w-full px-6 justify-center items-start text-black text-md">
      <label for="username" class="text-white">Username</label>
      <input type="text" class="pl-1 rounded-md w-full" name="username">

      <label for="email" class="text-white">Email</label>
      <input type="text" class="pl-1 rounded-md w-full" name="email">

      <label for="nama" class="text-white">Nama</label>
      <input type="text" class="pl-1 rounded-md w-full" name="nama">

      <label for="alamat" class="text-white">Alamat</label>
      <input type="text" class="pl-1 rounded-md w-full" name="alamat">

      <label for="nomor_telepon" class="text-white">Nomor telepon</label>
      <input type="text" class="pl-1 rounded-md w-full" name="nomor_telepon">

      <label for="tanggal_lahir" class="text-white">Tanggal lahir</label>
      <input type="date" class="pl-1 rounded-md w-full" name="tanggal_lahir">

      <label for="password" class="text-white">Password</label>
      <input type="password" class="pl-1 rounded-md w-full" name="password">

      <label for="confirm_password" class="text-white">Confirm Password</label>
      <input type="password" class="pl-1 rounded-md w-full" name="confirm_password">

      <button type="button"
        class="bg-green-800 hover:bg-green-400 w-1/2 mx-auto px-2 py-1 text-white rounded-md text-lg mt-5">Register
        Now</button>
    </form>
  </div>
  @endsection

</div>