@extends('layout.v_user_template')
@section('title','List Pengajuan')

@section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1>Data List Pengajuan</h1>
          </div>
        </div>
      </div>


      <div class="card">

      
        <div class="card-header">
          
          <div>
            <div class="col">
            <h6>Filter Data</h6>
              <form action="/list" method="GET" class="form-inline">
                <input type="search" class="form-control mr-sm-2" name="search" placeholder="cari nama peralatan">
                <button class="btn btn-outline-info col-1.5 my-0 my-sm-0" type="submit">
                      <div>
                        <i class="fa fa-search" aria-hidden="true"></i>
                      </div>
                </button>
              </form>
            </div>
          </div>

        </div>


        <div class="card-body">
        <table class="table">
                            <thead class="thead">
                              <tr>
                                <th scope="col" class="table-primary">No</th>
                                <th scope="col" class="table-primary">@sortablelink('alat','Saran Masukan')</th>
                                <th scope="col" class="table-primary">Lokasi</th>
                                <th scope="col" class="table-primary">Keluhan</th>
                                <th scope="col" class="table-primary">Action</th>
                              </tr>
                            </thead>
                            @php $no = 1; @endphp
                    @foreach( $datas as $key => $value )
                            <tbody>
                                <tr>
                                  <th scope="row">{{ $key + $datas->firstItem() }}</th>
                                  <td>{{ $value->alat }}</td>
                                  <td>{{ $value->lokasi }}</td>
                                  <td>{{ $value->kendala }}</td>
                                  <td>

                                          <a href="/tampilkandata/{{$value->id}}"  class="btn btn-outline-info">
                                            <div>
                                              <i class="fas fa-edit" aria-hidden="true"></i>
                                            </div>
                                          </a>
                                          
                                          <a href="/delete/{{$value->id}}" type="button" class="btn btn-outline-danger">
                                          <div>
                                              <i class="fa fa-trash" aria-hidden="true"></i>
                                            </div>
                                          </a>

                                  </td>
                                </tr>
                             </tbody> 
                          @endforeach
                 </table> 
                    
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
      {!! $datas->appends(Request::except('page'))->render() !!}

@endsection