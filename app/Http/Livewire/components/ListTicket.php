<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class ListTicket extends Component
{
    public $layout = 'grid';
    public $tickets = [
        [
            "id" => 1,
            "nama" => "Taman Safari Bogor",
            "img_dir" => "https://awsimages.detik.net.id/community/media/visual/2020/09/09/new-normal-di-taman-safari-3_169.jpeg",
            "deskripsi" => "Taman Safari Indonesia adalah tempat wisata keluarga berwawasan lingkungan yang berorientasi pada habitat satwa di alam bebas.",
            "provinsi" => "Jawa Barat",
            "kota" => "Jakarta Bogor",
            "kecamatan" => "Cisarua",
            "harga" => 250000
        ],
        [
            "id" => 2,
            "nama" => "Eco Green Park",
            "img_dir" => "https://tempatasik.com/wp-content/uploads/2019/08/eco-green-park.jpg",
            "deskripsi" => "Di tempat wisata ini kalian bisa puas mengelilingi banyak wahana yang ada sekaligus belajar banyak tentang alam. Tentunya semua wahana yang ada di Eco Green Park bisa dinikmati oleh semua anggota keluarga.",
            "provinsi" => "Jawa Timur",
            "kota" => "Batu",
            "kecamatan" => "Batu",
            "harga" => 100000
        ],
        [
            "id" => 3,
            "nama" => "Batu Night Spectacular (BNS)",
            "img_dir" => "https://malang-post.com/wp-content/uploads/2021/01/bns.png",
            "deskripsi" => 'Batu Night Spectacular adalah sebuah lokawisata yang berada di Kota Batu, Jawa Timur. BNS hanya beroperasi pada malam hari. BNS menggabungkan konsep pusat perbelanjaan, permainan, olahraga, dan hiburan di dalamnya. BNS berada dalam grup Jawa Timur Park Group',
            "provinsi" => "Jawa Timur",
            "kota" => "Batu",
            "kecamatan" => "Batu",
            "harga" => 100000
        ],
        [
            "id" => 4,
            "nama" => "Jatim Park 2",
            "img_dir" => "https://cdn.nativeindonesia.com/foto/jatim-park-2/Jatim-Park-2.webp",
            "deskripsi" => 'Batu Secret Zoo merupakan tempat wisata dan kebun binatang modern yang terletak di Kota Batu, Jawa Timur. Batu Secret Zoo yang berada di tanah seluas 14 hektare tersebut merupakan bagian dari Jatim Park 2, selain Pohon Inn dan Museum Satwa',
            "provinsi" => "Jawa Timur",
            "kota" => "Batu",
            "kecamatan" => "Batu",
            "harga" => 150000
        ],
        [
            "id" => 5,
            "nama" => "Kebun Binatang Surabaya",
            "img_dir" => "https://cdn1-production-images-kly.akamaized.net/XyTOXoYNyjQ8cLj2rIgOL_UYWyE=/640x360/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/538407/original/kbs-surabaya-zoo-140109c.jpg",
            "deskripsi" => 'Kebun Binatang Surabaya adalah salah satu kebun binatang yang populer di Indonesia dan terletak di Surabaya. KBS merupakan kebun binatang yang pernah terlengkap se-Asia Tenggara, di dalamnya terdapat lebih dari 981 spesies satwa yang berbeda yang terdiri lebih dari 2.806 binatang.',
            "provinsi" => "Jawa Timur",
            "kota" => "Surabaya",
            "kecamatan" => "Wonokromo",
            "harga" => 125000
        ],
        [
            "id" => 6,
            "nama" => "Pantai Kuta",
            "img_dir" => "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/The_View_of_Kuta_Beach%2C_Bali.jpg/375px-The_View_of_Kuta_Beach%2C_Bali.jpg",
            "deskripsi" => 'Pantai Kuta adalah sebuah tempat pariwisata yang terletak di kecamatan Kuta, sebelah selatan Kota Denpasar, Bali, Indonesia. Daerah ini merupakan sebuah tujuan wisata turis mancanegara dan telah menjadi objek wisata andalan Pulau Bali sejak awal tahun 1970-an.',
            "provinsi" => "Bali",
            "kota" => "Badung",
            "kecamatan" => "Kuta",
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
