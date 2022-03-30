@extends('admin.admin_master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Görev Oluştur</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Görev Tanımla</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
{{--                    {{route('mytasks.store')}}--}}
                    <form action="{{route('mytasks.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Görev Tanımı</label>
                                <input type="text" name="tasks" class="form-control" id="exampleInputEmail1" placeholder="Görev Kısa Tanım">
                                @error('tasks')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputEmail1">Durum</label>--}}
{{--                                <input type="text" name="status" class="form-control" placeholder="Enter email">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputFile">File input</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <div class="custom-file">--}}
{{--                                        <input type="file" class="custom-file-input" id="exampleInputFile">--}}
{{--                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="input-group-append">--}}
{{--                                        <span class="input-group-text">Upload</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}


                        <!-- /.card-body -->
<div class="row">
    <div class="col-md-4">   <div class="form-group">
            <label>Görev Ata</label>
            <select class="custom-select" name="user_id">
                @foreach($users as $user )
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div></div>
    <div class="col-md-4"> <div class="form-group" >
            <label>Görev Önceliği</label>
            <select class="custom-select" name="priority">
                <option value="0">Sıradan</option>
                <option value="1">Yüksek</option>
            </select>
        </div></div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Teslim Tarihi</label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input type="text" name="DeadLine" class="form-control datetimepicker-input" data-target="#reservationdate">
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>Görev Detayı</label>
            <textarea class="form-control" name="TaskDetail" rows="3" placeholder="Görev Detayını Giriniz ..."></textarea>
        </div>
    </div>
</div>
</div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
