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
{{--                    {{ dd(\Carbon\Carbon::parse($todo->DeadLine)->format('Y-m-d'))}}--}}
{{--                {{ \Carbon\Carbon::parse($todo->DeadLine)->format('y-m-d')}}--}}
                    <!-- /.card-header -->
                    <!-- form start -->
                    {{--                    {{route('mytasks.store')}}--}}
                    <form action="{{route('mytasks.update',$todo)}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Görev Tanımı</label>
                                <input type="text" name="tasks" value="{{$todo->tasks}}" class="form-control" id="exampleInputEmail1" placeholder="Görev Kısa Tanım">
                            </div>
                            <div class="row">
                                <div class="col-md-4">   <div class="form-group">
                                        <label>Görev Ata</label>
                                        <select class="custom-select" name="user_id">
                                                @foreach ($users as $row )
                                                    <option @php if($row->id == $todo->user_id ) { echo "selected";} @endphp value="{{$row->id}}">{{$row->name}} </option>
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
                                            <input type="text" value="{{\Carbon\Carbon::parse($todo->DeadLine)->format('Y-m-d')}}" name="DeadLine" class="form-control datetimepicker-input" data-target="#reservationdate">
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
