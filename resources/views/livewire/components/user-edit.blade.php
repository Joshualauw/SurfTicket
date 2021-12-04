<div class="flex items-center justify-center w-full mt-10">
    <div class="flex flex-col space-y-3 items-center justify-center w-1/2 h-full">
        <img src="{{ asset($img_dir) }}" wire:model='img_dir' alt="" class="rounded-full w-56 h-56">
    </div>
    <form wire:submit.prevent='updateUserData' class="flex flex-col w-1/2" enctype='multipart/form-data'>
        <p class="text-sm">Username</p>
        <input type="text"
            class="rounded-md py-1 px-2 text-md mb-2 bg-gray-300 @error('username') ring-1 ring-red-500 @enderror"
            wire:model='username'>
        @error('username')
        <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <p class="text-sm">Nama</p>
        <input type="text"
            class="rounded-md py-1 px-2 text-md mb-2 bg-gray-300 @error('nama') ring-1 ring-red-500 @enderror"
            wire:model='nama'>
        @error('nama')
        <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <p class="text-sm">Email</p>
        <input type="text"
            class="rounded-md py-1 px-2 text-md mb-2 bg-gray-300 @error('email') ring-1 ring-red-500 @enderror"
            wire:model='email'>
        @error('email')
        <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <p class="text-sm">Profile Picture</p>
        <input type="file" class="rounded-md py-1 px-2 text-md mb-2 bg-gray-300" wire:model='img_file'>
        <p class="text-sm">Alamat</p>
        <input type="text" class="rounded-md py-1 px-2 text-md mb-2 bg-gray-300" wire:model='alamat'>
        <p class="text-sm">No.Telp</p>
        <input type="number" class="rounded-md py-1 px-2 text-md mb-2 bg-gray-300" wire:model='no_telp'>
        <p class="text-sm">Tanggal Lahir</p>
        <input type="date" class="rounded-md py-1 px-2 text-md mb-2 bg-gray-300" wire:model='tanggal_lahir'>
        <button type="submit"
            class="py-1 px-3 mt-3 bg-green-700 hover:bg-green-600 rounded-md text-white text-md self-end">Save
            Changes</button>
    </form>
    @if (Session::has("flash"))
    @livewire('components.the-modal', ["flash" => Session::get("flash")])
    @endif
</div>