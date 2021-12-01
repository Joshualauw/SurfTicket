<div class="w-full border-t-4 border-green-800">
    <div class="w-full mx-auto py-4 px-24" style="height: 550px;">
        <p class="text-green-700 font-semibold text-4xl my-8">Daftar Sekarang</p>
        <div class="flex justify-between">
            <div>
                <div class="grid grid-cols-3 place-items-center mt-20">
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
                <div class="flex flex-col w-3/4 mx-auto space-y-5 p-5">
                    <i class="fas fa-user-circle text-6xl text-gray-400 text-center"></i>

                    @if ($computedRegister)
                    <input type="text" name="username" class="pl-1 py-2 bg-gray-200 text-gray-600"
                        placeholder="Username">
                    <input type="text" name="email" class="pl-1 py-2 bg-gray-200 text-gray-600" placeholder="Email">
                    <input type="text" name="password" class="pl-1 py-2 bg-gray-200 text-gray-600"
                        placeholder="Password">
                    <input type="text" name="confirm_password" class="pl-1 py-2 bg-gray-200 text-gray-600"
                        placeholder="Confirm Password">
                    @else
                    <input type="text" name="username" class="pl-1 py-2 bg-gray-200 text-gray-600"
                        placeholder="Username">
                    <input type="text" name="password" class="pl-1 py-2 bg-gray-200 text-gray-600"
                        placeholder="Password">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>