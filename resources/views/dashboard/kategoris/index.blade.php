@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Fitur Materi</h1>
</div>    

@if (session()->has('berhasil'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('berhasil') }}
</div>
@endif

<div class="table-responsive col-lg-8">
  <a href="/dashboard/kategoris/create" class="btn btn-primary mb-3">Fitur baru</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kategori</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
           @foreach ($kategoris as $kategori) 
           <tr>
             <td>{{ $loop->iteration }}</td>
             <td>{{$kategori->name }}</td>

             <td>
              <a href="/dashboard/kategoris/{{$kategori->slug }}" class="badge 
                btn-info"><span data-feather="eye"></span></a>

              <a href="/dashboard/kategoris/{{$kategori->slug }}/edit" class="badge btn-warning"><span data-feather="edit"></span></a>

              <form action="/dashboard/kategoris/{{$kategori->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Data ini akan dihapus?')">
                  <span data-feather="x-circle"></button>
              </form>

             </td>
           </tr>
           @endforeach
      </tbody>
    </table>
  </div>

@endsection