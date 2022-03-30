@extends('admin.admin_master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Yapılacak İşler</h1>
                </div>
                </div>
            <div class="row">

                <div class="col-md-12 mb-4"><input type="text" class="form-control"  placeholder="Yapılacak işle ilgili ipucu veriniz " id="find">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                    {{--                        <div class="card-header">--}}
                    {{--                            <h3 class="card-title">DataTable with minimal features & hover style</h3>--}}
                    {{--                        </div>--}}
                    <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Yapılacak İş</th>
                                    <th>İş Durumu</th>
{{--                                    <th>İş Statusü</th>--}}
                                    <th>Öncelik</th>
                                    <th>Teslim Tarihi</th>
                                    <th>Açılış Tarihi</th>
                                    <th>Düzenle</th>
                                    <th>Sil</th>
                                </tr>
                                </thead>
                                <tbody>
                                <div id="show"></div>

                                @foreach($tasks as $task => $row)
{{--                                {{dd($row->DeadLine)}}--}}
                                                          <tr>

{{--                                                              <div id="find"></div>--}}

                                                              <td>{{++$task}}</td>
                                        <td>{{$row->tasks}}</td>
                                        <td>
                                            @if($row->status===0)
                                                {{$row->user->name." Görevi Kapattı"}}
                                            @elseif($row->status===1)
                                                Görev Açık
                                            @endif
                                        </td>
                                        <td @if($row->priority == "1" ) ?  class="text-danger"  @endif>{{ ($row->priority== 1) ? 'Yüksek' : 'standart'}}</td>
{{--                                        <td>X</td>--}}
{{--                                        <td>{{Carbon\Carbon::now()->addSeconds($row->deadline)->diffForHumans($row->created_at) }}</td>--}}
                                        <td>@if($row->DeadLine!=NULL){{Carbon\Carbon::parse( $row->DeadLine)->diffForHumans() }} @else Teslim Tarihi Eklenmemiş @endif</td>
                                        <td>{{$row->created_at}}</td>
                                        <td><a href="{{route('mytasks.edit',$row)}}"><button class="btn btn-info">Düzenle</button></a></td>
                                        <td><a href="{{route('mytasks.delete',$row)}}"><button class="btn btn-warning">Sil</button></a></td>

                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
{{--                                <tr>--}}
{{--                                    <th>Rendering engine</th>--}}
{{--                                    <th>Browser</th>--}}
{{--                                    <th>Platform(s)</th>--}}
{{--                                    <th>Engine version</th>--}}
{{--                                    <th>CSS grade</th>--}}
{{--                                </tr>--}}
                                </tfoot>
                            </table>
                            <div class="float-right">
                                {{$tasks->links('pagination-links')}}

                            </div>

                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <!-- /.col -->
                </div>
                <!-- /.row -->

            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

@endsection
