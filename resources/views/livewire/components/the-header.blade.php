<div class="flex py-4 px-24 mx-auto justify-between items-center bg-green-700 shadow-lg">
    <h1 class="text-3xl text-white"><a href="/">Surf<span class="text-green-300">Ticket</span></a></h1>
    <ul class="flex justify-center items-center space-x-10 text-white">
        <li><a href="/home" class="hover:border-b-2 hover:border-green-200 pb-1">Home</a></li>
        <li><a href="/tickets" class="hover:border-b-2 hover:border-green-200 pb-1">Tickets</a></li>
        <li><a href="/" class="hover:border-b-2 hover:border-green-200 pb-1">About</a></li>
        @auth
        <li>
            <img class="w-9 h-9 rounded-full relative cursor-pointer" wire:click='toogleDropdown' wire:model='isOpen'
                src="https://kerma.widyatama.ac.id/wp-content/uploads/2021/05/blank-profile-picture-973460_1280.png">
            @if ($isOpen)
            <div class="origin-top-right absolute right-20 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10"
                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                <div class="py-1" role="none">
                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                    <a href="/settings" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-200" role="menuitem"
                        tabindex="-1" id="menu-item-0">Settings</a>
                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-200" role="menuitem"
                        tabindex="-1" id="menu-item-1">My Tickets</a>
                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-200" role="menuitem"
                        tabindex="-1" id="menu-item-2">History</a>
                    <button
                        class="text-gray-700 block w-full text-left px-4 py-2 text-sm hover:bg-gray-200 border-t-2 border-gray-200"
                        role="menuitem" tabindex="-1" wire:click='signOut'>
                        Sign out
                    </button>
                </div>
            </div>
            @endif
        </li>
        @endauth
    </ul>
</div>