@extends('main_admin')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tables</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                 Nhập tên danh mục
                 <button class="btn btn-default" id="show" style="margin-left: 8px" >Show</button>
             </div>
             <div class="panel-body showbody">
                <div class="row">
                    <div class="col-lg-12">
                     <form role="form" name="product" method="post" action="{{route('addproduct')}}" enctype="multipart/form-data" >
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input name="name" class="form-control" placeholder="Enter text">
                    </div>
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select name="catalog_id" class="form-control">

                         @foreach($dataCatalog as $value)
                         <option value="{{$value->id}}">{{$value->name}}</option>
                         @endforeach
                     </select>
                 </div> 
                 <div class="form-group">
                    <label>Số lượng</label>
                    <input name="count" type="number" class="form-control" placeholder="Enter text">
                </div>
                <div class="form-group">
                    <label>Giá tiền</label>
                    <input name="price" type="number" class="form-control" placeholder="Enter text">
                </div>
                <div class="form-group">
                    <label>Giảm giá</label>
                    <input name="discount" type="number" class="form-control" placeholder="Enter text">
                </div>
                <div class="form-group">
                    <label>Kích thước</label>
                    <input name="size" class="form-control" placeholder="Enter text">
                </div>
                <div class="form-group">
                    <label>Màu sắc</label>
                    <input name="color" class="form-control" placeholder="Enter text">
                </div>
                <div class="form-group">
                    <label>Ảnh</label>
                    <input name="image[]" type="file" multiple>
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
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
<!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Bản sản phẩm
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th>Mã số</th>
                                <th>Danh mục</th>
                                <th>Số hàng</th>
                                <th>Kích thước</th>
                                <th>Màu sắc</th>
                                <th>Giá</th>
                                <th>Giảm giá</th>
                                <th>Ảnh đại diện</th>
                                <th>Mô tả</th>
                                <th>Ngày tạo</th>
                                <th><input type="checkbox" id="select_all"></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php $i=1; ?>
                         @foreach($data as $value)
                         <tr class="tr_s">
                            <th>{{$i++}}</th>
                            <th>{{$value->name}}</th>
                            <th>{{$value->id}}</th>
                            <th>{{$value->catalog_id}}</th>
                            <th>{{$value->count}}</th>
                            <th>{{$value->size}}</th>
                            <th>{{$value->color}}</th>
                            <th>{{$value->price}}</th>
                            <th>{{$value->discount}}</th>
                            <th><a href="images/{{$value->folder}}/{{$value->image_link}}">{{$value->image_link}}</a></th>
                            <th>{{$value->description}}</th>
                            <th>{{$value->createat}}</th>
                            <th><input type="checkbox" name='deleteall'></th>
                            <th><a href="admin/product/edit/{{$value->id}}">Edit</a></th>
                            <th><a href="admin/product/delete/{{$value->id}}">Delete</a></th>
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