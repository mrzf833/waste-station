@extends('user.layout.dashboard.layout')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('script')
<script src="{{ asset('assets-mazer/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets-mazer/vendors/jquery-datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets-mazer/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js') }}"></script>
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
                        <div class="overflow-x-auto">
                            <table id="riwayat_setor" class="display" style="width:100%">
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
</div>
@endsection