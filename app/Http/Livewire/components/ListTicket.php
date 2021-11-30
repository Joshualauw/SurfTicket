<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class ListTicket extends Component
{
    public $layout = 'grid';
    public $tickets = [
        [
            "id" => 1,
            "nama" => "Liyue Harbor",
            "img_dir" => "https://static.wikia.nocookie.net/gensin-impact/images/f/f9/Harbor.png",
            "deskripsi" => "The establishment of the harbor kicked off Liyue's seafaring trade. As Teyvat's largest market harbor, the sheer amount of goods that flow to and from it is simply incomparable for other ports.",
            "provinsi" => "Jawa Timur",
            "kota" => "Surabaya",
            "kecamatan" => "Lakarsantri",
            "harga" => 250000
        ],
        [
            "id" => 2,
            "nama" => "Inazuma City",
            "img_dir" => "https://static.wikia.nocookie.net/gensin-impact/images/4/43/Inazuma_City.png",
            "deskripsi" => "Inazuma's most lively and prosperous area, where most of Inazuma's population lives. From Hanamizaka to the streets of the city, you can follow the trail to visit local traditional shops and sample Inazuma specialties.",
            "provinsi" => "Jawa Timur",
            "kota" => "Surabaya",
            "kecamatan" => "Lakarsantri",
            "harga" => 100000
        ],
        [
            "id" => 3,
            "nama" => "Chinju Forest",
            "img_dir" => "https://static.wikia.nocookie.net/gensin-impact/images/d/df/Viewpoint_The_Sacred_Forest_in_the_Moonlight.png",
            "deskripsi" => 'Here one can find Tanuki statues everywhere, torii gates scattered throughout the forest, and abandoned shrines hidden in the depths... Like a flowing river, they tell of legends meandering into a forgotten past.',
            "provinsi" => "Jawa Timur",
            "kota" => "Surabaya",
            "kecamatan" => "Lakarsantri",
            "harga" => 100000
        ],
        [
            "id" => 4,
            "nama" => "Wangshu Inn",
            "img_dir" => "https://static.wikia.nocookie.net/gensin-impact/images/b/b7/Wangshu_Inn.jpg",
            "deskripsi" => 'As most of the patrons that stop here are traveling merchants, the inn provides an area for them to trade and set up stalls. The view from the top of the inn is jaw-dropping — weather permitting you can see all the way to Mt. Qingce and Jueyunjian in the distance',
            "provinsi" => "Jawa Timur",
            "kota" => "Surabaya",
            "kecamatan" => "Lakarsantri",
            "harga" => 150000
        ],
        [
            "id" => 5,
            "nama" => "Qingce Village",
            "img_dir" => "https://static.wikia.nocookie.net/gensin-impact/images/e/e9/Qingce_Village.jpg",
            "deskripsi" => 'At the northernmost point of Liyue, hidden between the hills and the bamboo forests sits Qingce Village.',
            "provinsi" => "Jawa Timur",
            "kota" => "Surabaya",
            "kecamatan" => "Lakarsantri",
            "harga" => 125000
        ],
        [
            "id" => 6,
            "nama" => "Mondstadt",
            "img_dir" => "https://static.wikia.nocookie.net/gensin-impact/images/9/97/Falcon_Coast.jpg",
            "deskripsi" => 'The namesake of the nation.
            It features cobblestone streets and has several windmills both large and small dotting the city. The lower area houses the market district, while the upper area is for the Cathedral and the Library',
            "provinsi" => "Jawa Timur",
            "kota" => "Surabaya",
            "kecamatan" => "Lakarsantri",
            "harga" => 300000
        ]
    ];

    public function mount($layout)
    {
        $this->layout = $layout;
    }

    public function render()
    {
        return view('livewire.components.list-ticket');
    }
}
