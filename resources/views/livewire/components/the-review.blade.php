<div class="flex justify-between items-start w-full mt-6">
    @if (count($reviews) <= 0) <p class="text-lg justify-center items-center w-1/2 font-semibold text-center">Belum Ada Reviews</p>
        @else
        <div class="w-1/2 flex flex-col items-center justify-center">
            <p class="text-5xl font-bold"> <i class="fas fa-star text-4xl text-yellow-300"></i>{{
                number_format($averageScore, 1) }}</p>
            <p class="text-lg">Average Score</p>
        </div>
        @endif
        <div class="flex flex-col w-1/2">
            @foreach ($reviews as $review)
            <div class="flex justify-start items-center space-x-3 pb-5 border-b-2 border-gray-300">
                <img src="{{asset($review->user->img_dir)}}" class="w-16 h-16 rounded-full" alt="">
                <div class="flex flex-col justify-center items-start space-y-2">
                    <p class="text-sm font-semibold">{{ $review->user->nama }}</p>
                    <div class="flex">
                        @for ($i = 0; $i < 5; $i++) @if ($i < $review->rating)
                            <i class="fas fa-star text-lg text-yellow-300"></i>
                            @else
                            <i class="fas fa-star text-lg text-gray-300"></i>
                            @endif
                        @endfor
                    </div>
                    <p class="text-xs">{{ $review->comment }}</p>
                </div>
            </div>
            @endforeach
            {{ $reviews->links() }}
            <div class="flex flex-col justify-end items-end space-y-3 mt-5">
                <textarea wire:model='reviewText' class="rounded-md bg-gray-300 p-1" cols="50" rows="3"></textarea>
                <div class="flex space-x-5">
                    <div>
                        @for ($i=0; $i<5; $i++)
                            @if ($i<$reviewRating)
                                <i class="fas fa-star text-lg cursor-pointer text-yellow-300" wire:click='setRating({{ $i }})'></i>
                            @else
                                <i class="fas fa-star text-lg cursor-pointer text-gray-300" wire:click='setRating({{ $i }})'></i>
                            @endif
                        @endfor
                    </div>
                    <button wire:click='tambahReview' class="py-1 px-3 bg-green-700 hover:bg-green-600 text-white text-sm self-end rounded-md">{{ $isEdit ? 'Edit Review' : 'Tambah Review' }}</button>
                </div>
            </div>
        </div> 
        @if (Session::has("flash"))
        @livewire('components.the-modal', ["flash" => Session::get("flash")])
        @endif
</div>