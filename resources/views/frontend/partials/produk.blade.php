<section id="produk" class="frontend-produk">

    <div class="container">

        {{-- Header --}}
        <div class="frontend-produk-header">

            <span class="frontend-section-badge">
                🛍 Produk UMKM
            </span>

            <h2>
                Produk Unggulan
                <span>Desa Karangduwet</span>
            </h2>

            <p>
                Berbagai produk hasil karya masyarakat Desa Karangduwet
                yang memiliki kualitas terbaik dan menjadi kebanggaan desa.
            </p>

        </div>

        @php

        $produks = [

        [
        'nama'=>'Keripik Pisang',
        'kategori'=>'Makanan',
        'harga'=>'Rp15.000',
        'gambar'=>'images/produk/keripik.jpg',
        'deskripsi'=>'Keripik pisang renyah dengan berbagai varian rasa.',
        'slug'=>'#'
        ],

        [
        'nama'=>'Kursi Bambu',
        'kategori'=>'Kerajinan',
        'harga'=>'Rp350.000',
        'gambar'=>'images/produk/kursi.jpg',
        'deskripsi'=>'Kerajinan bambu buatan masyarakat lokal.',
        'slug'=>'#'
        ],

        [
        'nama'=>'Kopi Lokal',
        'kategori'=>'Minuman',
        'harga'=>'Rp35.000',
        'gambar'=>'images/produk/kopi.jpg',
        'deskripsi'=>'Kopi pilihan dengan cita rasa khas pegunungan.',
        'slug'=>'#'
        ],

        [
        'nama'=>'Anyaman Bambu',
        'kategori'=>'Kerajinan',
        'harga'=>'Rp120.000',
        'gambar'=>'images/produk/anyam.jpg',
        'deskripsi'=>'Produk anyaman bambu handmade berkualitas.',
        'slug'=>'#'
        ],

        [
        'nama'=>'Emping Melinjo',
        'kategori'=>'Makanan',
        'harga'=>'Rp28.000',
        'gambar'=>'images/produk/emping.jpg',
        'deskripsi'=>'Emping khas desa dengan rasa gurih alami.',
        'slug'=>'#'
        ],

        [
        'nama'=>'Madu Hutan',
        'kategori'=>'Produk Alam',
        'harga'=>'Rp95.000',
        'gambar'=>'images/produk/madu.jpg',
        'deskripsi'=>'Madu murni hasil hutan sekitar desa.',
        'slug'=>'#'
        ]

        ];

        @endphp


        {{-- Grid Produk --}}

        <div class="frontend-produk-grid">
            @foreach($produks as $produk)
            <a href="{{ $produk['slug'] }}" class="frontend-produk-card">
                <div class="frontend-produk-image">
                    <img
                        src="{{ asset($produk['gambar']) }}"
                        alt="{{ $produk['nama'] }}">
                    <span class="frontend-produk-badge">
                        {{ $produk['kategori'] }}
                    </span>
                </div>


                <div class="frontend-produk-content">
                    <h3>
                        {{ $produk['nama'] }}
                    </h3>

                    <p>
                        {{ $produk['deskripsi'] }}
                    </p>

                    <div class="frontend-produk-bottom">
                        <span class="frontend-produk-price">
                            {{ $produk['harga'] }}
                        </span>
                        <span class="frontend-produk-detail">
                            Detail
                            <i class="bi bi-arrow-right"></i>
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        {{-- Footer --}}
        <div class="frontend-produk-footer">
            <a href="#" class="frontend-produk-more">
                Lihat Semua Produk
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>