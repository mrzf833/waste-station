@extends('user.layout.dashboard.layout')

@section('css')
    {{-- <link rel="stylesheet" href="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.js"></script> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('script')
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#riwayat_setor').DataTable({
            processing: true,
            responsive: true,
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
            <div class="lg:ml-16 w-full flex flex-col">
                <div class="w-full bg-[#F6F6F6] rounded h-full px-14 py-16">
                    <div class="mb-16">
                        <h4 class="text-3xl hidden lg:block">Riwayat Setor</h4>
                        <div class="flex items-center py-4 lg:hidden">
                            <i class="fa-solid fa-cart-shopping fa-2xl"></i>
                            <a href="{{ route('user.riwayat_setor.index') }}" class="flex flex-col ml-4">
                                <span class="text-3xl">Riwayat Setor</span>
                                <span class="text-sm text-[#7D7D7D]">{{ $riwayatSetorTotal }} Transaksi</span>
                            </a>
                        </div>
                    </div>
                    <div>
                        <table id="riwayat_setor" class="display table w-full">
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