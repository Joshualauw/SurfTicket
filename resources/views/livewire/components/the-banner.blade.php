<div class="flex justify-center items-center h-64 w-3/4 mt-20 mx-auto bg-gray-300 rounded-lg relative" x-data>
    <div class="swiper mySwiper w-full h-full relative">
        <div class="swiper-wrapper rounded-md shadow-lg">
            @foreach ($images as $image)
            <a href="promo/{{ $image->id }}" class="swiper-slide hover:border-4 hover:border-green-700">
                <img src="{{ asset($image->img_dir) }}" class="w-full h-full" alt="">
            </a>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <div class="swiper-button-prev-unique absolute -left-10 top-1/2"><i class="fas fa-chevron-left text-4xl"></i>
    </div>
    <div class="swiper-button-next-unique absolute -right-10 top-1/2"><i class="fas fa-chevron-right text-4xl"></i>
    </div>
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            slidesPerView: 2,
            spaceBetween: 10,
            centeredSlides: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: true,
            },
            navigation: {
              nextEl: ".swiper-button-next-unique",
              prevEl: ".swiper-button-prev-unique",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            mousewheel: true,
            keyboard: true,
          });
    </script>
</div>