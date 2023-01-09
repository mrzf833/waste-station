@extends('user.layout.dashboard.layout')

@section('css')
    {{-- <link rel="stylesheet" href="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.js"></script> --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#riwayat_setor').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('user.riwayat_setor.datatable') }}",
            },
            columns: [
                {
                    data: 'employees_username',
                    name: 'employees_username',
                    // orderable: false
                },
                {
                    data: 'total_waste',
                    name: 'total_waste',
                    // orderable: false
                },
                {
                    data: 'total_point',
                    name: 'total_point',
                    // orderable: false
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    // orderable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
            ]
        });
        } );
    </script>
@endsection

@section('content')
<div class="mx-8">
    <div class="container mx-auto pt-72">
        <div class="flex">
            @include('user.layout.dashboard.sidebar')
            <div class="ml-16 w-full flex flex-col">
                <div class="w-full bg-[#F6F6F6] rounded h-full px-14 py-16">
                    <h4 class="text-3xl mb-16">Riwayat Setor</h4>
                    {{-- <div class="flex flex-row flex-wrap">
                        <div class="px-4 py-4 w-1/2">
                            <div class="border w-full px-8 py-4 shadow-lg rounded-lg">
                                <div class="border-bottom flex justify-between mb-8">
                                    <div class="flex items-center">
                                        <i class="fa-solid fa-bag-shopping fa-2xl"></i>
                                        <div class="ml-4">
                                            <h5 class="text-sm">Sampah</h5>
                                            <span class="text-[#A8A8A8]">3 Des 2022</span>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-8 border-2">
                                <div class="flex">
                                    <img src="{{ asset('assets-user/sapu.png') }}" class="w-[100px]" alt="">
                                    <div class="ml-4">
                                        <h4 class="text-lg font-bold">Sapu Kebersihan</h4>
                                        <span class="text-sm text-[#A8A8A8]">1 Barang</span>
                                    </div>
                                </div>
                                <div class="flex flex-col mt-8">
                                    <span class="text-base">Total Harga</span>
                                    <span class="font-semibold text-lg">Rp102.750</span>
                                </div>
                            </div>
                        </div> --}}

                        <table id="riwayat_setor" class="display">
                            <thead class="">
                                <tr>
                                    <th>Petugas</th>
                                    <th>Total Sampah</th>
                                    <th>Total Point</th>
                                    <th>Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection