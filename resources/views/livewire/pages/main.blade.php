<div>
    @section('title')
    SurfTicket | Main
    @endsection

    @section('content')
    @livewire('components.the-header')
    <div class="grid grid-cols-3 w-1/2 mt-16 mx-auto place-items-center">
        <img src="https://media.istockphoto.com/photos/tropical-white-sand-beach-with-coco-palms-picture-id1181563943?k=20&m=1181563943&s=612x612&w=0&h=r46MQMvFnvrzzTfjVmvZED5nZyTmAYwISDvkdtM2i2A="
            alt="" class="rounded-full border-2 border-green-600 w-48 h-48">
        <img src="https://media.istockphoto.com/photos/spire-cove-picture-id1309140666?b=1&k=20&m=1309140666&s=170667a&w=0&h=3XV7byzsCPRqDxCmcgu9VBmJod9XvqKirWgd5D-IVCo="
            alt="" class="rounded-full border-2 border-green-600 w-56 h-56">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmN82w5YKFotmbYdvUHA30vN5Yzpd-FQhEbw&usqp=CAU"
            alt="" class="rounded-full border-2 border-green-600 w-48 h-48">
    </div>
    @livewire('components.the-first')
    @endsection
</div>