@extends('layout.tamplate')       


<!-- START DATA -->
@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{url('restoran')}}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
            
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
        <a href='{{ url('restoran/create')}}' class="btn btn-primary">+ Tambah Data</a>
    </div>
      
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">Kode Barang</th>
                <th class="col-md-3">Nama Barang</th>
                <th class="col-md-2">Satuan</th>
                <th class="col-md-2">Harga Satuan</th>
                <th class="col-md-2">Stok</th>
                <th class="col-md-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i =$data->firstItem() ?>
            @foreach ($data as $item)

            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->KodeBarang }}</td>
                <td>{{ $item->NamaBarang }}</td>
                <td>{{ $item->Satuan }}</td>
                <td>{{ $item->HargaSatuan }}</td>
                <td>{{ $item->Stok }}</td>
                <td>
                    <a href='{{ url('restoran/'.$item->KodeBarang.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                    <form onsubmit="return confirm('Yakin akan menghappus data?')" class='d-inline' action="{{url('restoran/'.$item->KodeBarang)}}"method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                    </form>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
    {{ $data->links()}}
</div>
<!-- AKHIR DATA -->
@endsection

    