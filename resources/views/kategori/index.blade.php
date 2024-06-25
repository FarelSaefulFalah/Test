@extends('layouts.master=')
@section('content')
    <div class="container">
        <div class="row justify-content-center  ">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Data Kategori
                        <a href="{{ route('kategori.create') }}" class="btn btn-sm btn-primary" style="float: right">Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="datatable">
                                <thead align="center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                @php $no = 1; @endphp
                                <tbody align="center">
                                    @foreach ($kategori as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->nama_kategori }}</td>
                                            <td>
                                                <form align="center" action="{{ route('kategori.destroy', $item->id) }}" id="delete-data"
                                                    method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a href="{{ route('kategori.edit', $item->id) }}"
                                                        class="btn btn-sm btn-outline-primary">
                                                        <img src="https://cdn-icons-png.flaticon.com/128/16187/16187749.png" style="" srcset="" width="20px">
                                                    </a>
                                                    <a href="{{ route('kategori.show', $item->id) }}"
                                                        class="btn btn-sm btn-outline-primary">
                                                        <img src="https://cdn-icons-png.flaticon.com/128/6804/6804049.png" alt="" srcset="" width="20px">
                                                    </a>

                                                    <button class="btn btn-sm btn-outline-primary" type="submit"
                                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                        <img src="https://cdn-icons-png.flaticon.com/128/1214/1214428.png" alt="" srcset="" width="20px"></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
