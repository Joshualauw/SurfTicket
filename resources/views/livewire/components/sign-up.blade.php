<div class="w-full border-t-4 border-green-800">
    <div class="w-full mx-auto py-4 px-24" style="height: 700px;">
        <p class="text-green-700 font-semibold text-4xl my-8">Daftar Sekarang</p>
        <div class="flex justify-between">
            <div>
                <div class="grid grid-cols-3 place-items-center mt-28">
                    <img src="https://media.istockphoto.com/photos/tropical-white-sand-beach-with-coco-palms-picture-id1181563943?k=20&m=1181563943&s=612x612&w=0&h=r46MQMvFnvrzzTfjVmvZED5nZyTmAYwISDvkdtM2i2A="
                        alt="" class="rounded-full border-2 border-green-600 w-48 h-48">
                    <img src="https://media.istockphoto.com/photos/spire-cove-picture-id1309140666?b=1&k=20&m=1309140666&s=170667a&w=0&h=3XV7byzsCPRqDxCmcgu9VBmJod9XvqKirWgd5D-IVCo="
                        alt="" class="rounded-full border-2 border-green-600 w-56 h-56">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmN82w5YKFotmbYdvUHA30vN5Yzpd-FQhEbw&usqp=CAU"
                        alt="" class="rounded-full border-2 border-green-600 w-48 h-48">
                </div>
            </div>
            <div class="flex flex-col w-2/5">
                <div class="flex justify-center items-center h-10 bg-green-700 cursor-pointer rounded-full">
                    <div wire:click='setNavTab("login")'
                        class="w-1/2 text-center text-white text-md {{ $computedLogin }}">
                        Login</div>
                    <div wire:click='setNavTab("register")'
                        class="w-1/2 text-center text-white text-md {{ $computedRegister }}">
                        Register
                    </div>
                </div>
                <i class="fas fa-user-circle text-6xl text-gray-400 text-center my-6"></i>
                @if ($computedRegister)
                <form wire:submit.prevent='register' class="flex flex-col w-3/4 mx-auto space-y-4 p-5">
                    <input type="text" name="username" wire:model='username'
                        class="pl-1 py-2 rounded-md bg-gray-200 text-gray-600 @error('username') ring-1 ring-red-500  @enderror"
                        placeholder="Username" value="{{ old('username') }}">
                    @error('username')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    <input type="text" name="nama" wire:model='nama'
                        class="pl-1 py-2 rounded-md bg-gray-200 text-gray-600 @error('nama') ring-1 ring-red-500  @enderror"
                        placeholder="Name" value="{{ old('nama') }}">
                    @error('nama')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    <input type="text" name="email" wire:model='email'
                        class="pl-1 py-2 rounded-md bg-gray-200 text-gray-600 @error('email') ring-1 ring-red-500  @enderror"
                        placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    <input type="password" name="password" wire:model='password'
                        class="pl-1 py-2 rounded-md bg-gray-200 text-gray-600 @error('password') ring-1 ring-red-500  @enderror"
                        placeholder="Password" value="{{ old('password') }}">
                    @error('password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    <input type="password" name="confirm" wire:model='confirm'
                        class="pl-1 py-2 rounded-md bg-gray-200 text-gray-600 @error('confirm') ring-1 ring-red-500  @enderror"
                        placeholder="Confirm Password" value="{{ old('confirm') }}">
                    @error('confirm')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="p-2 bg-green-700 text-white rounded-md hover:opacity-90 mt-8">Sign
                        Up</button>
                </form>

                @else
                <form wire:submit.prevent='login' class="flex flex-col w-3/4 mx-auto space-y-4 p-5">
                    <input type="text" name="loginUsername" wire:model='loginUsername'
                        class="pl-1 py-2 bg-gray-200 text-gray-600 rounded-md @error('loginUsername') ring-1 ring-red-500 @enderror"
                        placeholder="Username">
                    @error('loginUsername')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                    <input type="password" name="loginPassword" wire:model='loginPassword'
                        class="pl-1 py-2 bg-gray-200 text-gray-600 rounded-md @error('loginUsername') ring-1 ring-red-500 @enderror"
                        placeholder="Password">
                    @error('loginPassword')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="p-2 bg-green-700 text-white rounded-md hover:opacity-90 mt-8">Sign
                        In</button>
                </form>
                @endif
            </div>
        </div>
    </div>
    @if (Session::has("flash"))
    @livewire('components.the-modal', ["flash" => Session::get("flash")])
    @endif
</div>