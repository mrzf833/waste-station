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
</div>
@endsection