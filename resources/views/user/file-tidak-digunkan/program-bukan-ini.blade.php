@extends('user.layout.landing-page.layout')

@section('content')
<div class="pt-72">
    <div class="flex lg:flex-row lg:justify-between flex-col">
        <div class="ml-8 lg:ml-16">
            <h3 class="text-4xl font-medium text-[#666666] mb-2">Pengolahan Sampah Organik</h3>
            <p class="max-w-[400px] w-full text-[#303030] ml-4">
                Indonesia diperkirakan menghasilkan 64 juta ton sampah setiap tahun. Berdasarkan data Kementerian Lingkungan Hidup dan Kehutanan (KLHK), komposisi sampah didominasi oleh sampah organik, yakni mencapai 60% dari total sampah. Sampah organik merupakan sampah yang bisa terurai secara alami karena berasal dari sisa-sisa makhluk hidup. Namun sampah organik akan menjadi permasalahan besar apabila bercampur dengan jenis sampah lain dan menumpuk di Tempat Pemrosesan Akhir (TPA). Hal ini dikarenakan tumpukan sampah organik dapat menghasilkan gas metana yang sifatnya mudah meledak.​
                Jika sampah organik dibiarkan menumpuk di TPA tanpa adanya pengelolaan yang baik, maka akan mengakibatkan berbagai dampak negatif seperti menimbulkan berbagai penyakit berbahaya, menimbulkan gas metana yang dapat memicu ledakan dan kebakaran, serta menimbulkan global warming dan berdampak pada perubahan iklim.
            </p>
        </div>
        <div class="mx-8 lg:mr-32 flex lg:items-end justify-center mt-8">
            <div class="inline-block">
                <img class="w-[200px]" src="{{ asset('assets-user/organik.png') }}" alt="">
            </div>
        </div>
    </div>
</div>

<div class="pt-32">
    <img class="w-full" src="{{ asset('assets-user/bawah.png') }}" alt="">
    <div class="bg-[#54953A] pb-32">
        <div class="flex lg:justify-between flex-col lg:flex-row">
            <div class="ml-8 lg:ml-16 mb-8">
                <h3 class="text-4xl font-medium text-[#EBEBEB] mb-2">Pengolahan Sampah Non-Organik</h3>
                <p class="max-w-[400px] w-full text-[#EBEBEB] ml-4">
                    Permasalahan sampah selalu menjadi isu yang belum bisa terselesaikan hingga saat ini. Salah satu contohnya adalah belum terkelolanya sampah dengan baik, sedangkan timbulannya semakin bertambah setiap harinya. Hal ini membuat sampah menumpuk di Tempat Pemrosesan Akhir (TPA). Salah satunya ialah jenis sampah non-organik.
                    Sampah non-organik adalah jenis sampah yang membutuhkan ratusan tahun untuk bisa terurai, hal ini dikarenakan sampah non-organik berasal dari bahan non-hayati yang mengandung berbagai zat kimia. Sampah non-organik berasal dari berbagai kegiatan yang dilakukan oleh manusia mulai dari kegiatan industri sampai rumah tangga.
                    Jika sampah non-organik dibiarkan menumpuk di TPA tanpa adanya pengelolaan yang baik, maka akan mengakibatkan berbagai dampak negatif seperti gangguan kesehatan pada manusia, penurunan kualitas lingkungan dan merugikan aspek sosial dan ekonomi pada masyarakat.
                </p>
            </div>
            <div class="mx-8 lg:mr-32 flex lg:items-end justify-center">
                <div class="inline-block">
                    <img class="w-[200px]" src="{{ asset('assets-user/non-organik.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection