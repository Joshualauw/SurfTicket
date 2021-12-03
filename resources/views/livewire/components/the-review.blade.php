<div class="flex justify-between items-start w-full mt-6">
    @if (count($reviews) <= 0) <p class="text-lg font-semibold text-center">Belum Ada Reviews</p>
        @else
        <div class="w-1/2 flex flex-col items-center justify-center">
            <p class="text-5xl font-bold"> <i class="fas fa-star text-4xl text-yellow-300"></i>{{
                number_format($averageScore, 1) }}</p>
            <p class="text-lg">Average Score</p>
        </div>
        <div class="flex flex-col justify-center items-center w-1/2">
            @foreach ($reviews as $review)
            <div class="flex justify-between items-center space-x-3 pb-5 border-b-2 border-gray-300">
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
            <button class="py-1 px-3 bg-green-700 hover:bg-green-600 text-white text-sm self-end rounded-md mt-5">Tambah
                Review</button>
        </div>
        @endif
</div>
