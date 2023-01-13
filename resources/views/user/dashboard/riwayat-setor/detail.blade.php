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
                url: "{{ route('user.riwayat_setor.datatable.detail', $riwayatSetor->id) }}",
            },
            columns: [
                {
                    data: 'waste_name',
                    name: 'waste_name',
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
                    <h4 class="text-3xl mb-16">Riwayat Setor Detail</h4>
                        <div class="flex flex-col mb-4">
                            <label for="" class="mb-2">Petugas</label>
                            <input type="text" class="rounded-lg bg-gray-300" disabled value="{{ $riwayatSetor->employees_username }}">
                        </div>
                        <div class="flex flex-col md:flex-row">
                            <div class="flex flex-col mb-4 w-full">
                                <label for="" class="mb-2">Total Sampah</label>
                                <input type="text" class="rounded-lg bg-gray-300" disabled value="{{ $riwayatSetor->total_waste }}">
                            </div>
                            <div class="md:ml-4 flex flex-col mb-4 w-full">
                                <label for="" class="mb-2">Total Point</label>
                                <input type="text" class="rounded-lg bg-gray-300" value="{{ $riwayatSetor->total_point }}">
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <label for="" class="mb-2">Dibuat</label>
                            <input type="text" class="rounded-lg bg-gray-300" disabled value="{{ $riwayatSetor->created_at }}">
                        </div>

                        <div class="mt-16">
                            <table id="riwayat_setor" class="display">
                                <thead class="">
                                    <tr>
                                        <th>Sampah</th>
                                        <th>Total Sampah</th>
                                        <th>Total Point</th>
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