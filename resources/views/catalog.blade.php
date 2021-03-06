@extends('main_admin')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý danh mục</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                 Nhập tên danh mục
             </div>
             <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" name="addcatalog" method="post" action="{{route('addcatalog')}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label>Tên danh mục </label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input name="name" class="form-control" placeholder="Tên danh mục">
                                    </div>
                                </div>
                                {!!session('add')!!}
                            </div>
                            <div>
                                <button type="submit" class="btn btn-default">Thêm</button>
                                <button type="reset" class="btn btn-default">Xóa hết</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- nhập tên danh mục -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Bảng danh mục
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th>Tên danh mục</th>
                                <th>Mã số</th>
                                <th>Số sản phẩm</th>
                                <th><input type="checkbox" id='select_all' ></th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php $i=1;  ?>
                        	@foreach($data as $value)
                        	<tr class="tr_s">
                                <th> {{$i++}} </th>
                                <th>{{$value->name}}</th>
                                <th>{{$value->id}}</th>
                                <th>{{$value->count}}</th>
                                <th><input type="checkbox" name='deleteall'></th>
                                <th><a href="admin/catalog/edit/{{$value->id}}">Edit</a></th>
                                <th><a href="admin/catalog/delete/{{$value->id}}">Delete</a></th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<!-- /.row -->
</div>
            <!-- /#page-wrapper -->
@endsection
@section('js')

$(function() {
$('#select_all').click(function(event) {
  if(this.checked) {
      // Iterate each checkbox
      $(':checkbox').each(function() {
          this.checked = true;
      });
  }
  else {
    $(':checkbox').each(function() {
          this.checked = false;
      });
  }
});
});
@endsection