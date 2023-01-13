@extends('user.layout.landing-page.layout')

@section('content')
<div class="pt-48 lg:pt-72 z-40 relative">
    <div class="flex lg:flex-row lg:justify-between flex-col">
        <div class="ml-8 lg:ml-16">
            <h3 class="text-4xl font-medium text-[#666666] mb-2">Pengolahan Sampah Non-Organik</h3>
            <p class="max-w-[400px] w-full text-[#303030] ml-4">
                Permasalahan sampah selalu menjadi isu yang belum bisa terselesaikan hingga saat ini. Salah satu contohnya adalah belum terkelolanya sampah dengan baik, sedangkan timbulannya semakin bertambah setiap harinya. Hal ini membuat sampah menumpuk di Tempat Pemrosesan Akhir (TPA). Salah satunya ialah jenis sampah non-organik.
                    Sampah non-organik adalah jenis sampah yang membutuhkan ratusan tahun untuk bisa terurai, hal ini dikarenakan sampah non-organik berasal dari bahan non-hayati yang mengandung berbagai zat kimia. Sampah non-organik berasal dari berbagai kegiatan yang dilakukan oleh manusia mulai dari kegiatan industri sampai rumah tangga.
                    Jika sampah non-organik dibiarkan menumpuk di TPA tanpa adanya pengelolaan yang baik, maka akan mengakibatkan berbagai dampak negatif seperti gangguan kesehatan pada manusia, penurunan kualitas lingkungan dan merugikan aspek sosial dan ekonomi pada masyarakat.
            </p>
        </div>
        <div class="mx-8 lg:mr-32 flex lg:items-end justify-center mt-8">
            <div class="inline-block">
                <img class="w-[200px]" src="{{ asset('assets-user/non-organik.png') }}" alt="">
            </div>
        </div>
    </div>
</div>

<div class="pt-32">
    <img class="w-full" src="{{ asset('assets-user/bawah.png') }}" alt="">
</div>
@endsection