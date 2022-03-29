@extends('admin.main')

@section('head')
  <script src="{{url('/ckeditor/ckeditor.js')}}"></script>
@endsection


@section('content')
<form action="" method="POST">

    <div class="card-body">

      <div class="form-group">
        <label for="menu">Tên sản phẩm</label>
        <input type="text" name ="name" value="{{$product->name}}" class="form-control" placeholder="Nhập tên sản phẩm">
      </div>

     
      <div class="form-group">
        <label >Danh Mục</label>
        <select name="menu_id" value="{{old('menu_id')}}" class="form-control">
       
           @foreach ($menus as $menu)
          <option value="{{$menu->id}}"  {{$product->menu_id==$menu->id ? 'selected':''}}>
            {{$menu->name}}</option>
          @endforeach  

        </select>
      </div>

      <div class="form-group">
        <label for="menu">Gía sản phẩm</label>
        <input type="number" name ="price" value="{{$product->price}}" class="form-control" placeholder="Nhập giá sản phẩm">
      </div>

      <div class="form-group">
        <label >Mô tả</label>
        <textarea name="description"  class="form-control">{{$product->description}}</textarea>
      </div>

      <div class="form-group">
        <label >Mô tả chi tiết</label>
        <textarea name="content" id="content"   class="form-control">{{$product->content}}</textarea>
      </div>

      <div class="form-group">
        <label for="menu">ảnh sản phẩm</label>
        <input type="file" name="file" class="form-control" id="upload">
        <div id="image_show">
            <a href="{{$product->thumb}}" target="_blank"><img src="{{$product->thumb}}" width="100px"></a>
        </div>
        <input type="hidden" name="thumb" value="{{$product->thumb}}" id="file">
      </div>

      <div class="form-group">
        
        <label >Kích hoạt</label>


        <div class="custom-control custom-radio">
          <input class="custom-control-input" value="1" type="radio" id="active" name="active" 
            {{$product->active ==1 ? 'checked=""':''}}>
          <label for="active" class="custom-control-label">Có</label>
        </div>
        <div class="custom-control custom-radio">
          <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" 
          {{$product->active ==0 ? 'checked=""':''}}>
          <label for="no_active" class="custom-control-label">Không</label>
        </div>
  
      </div>

    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Tạo danh mục</button>
    </div>

    @csrf

  </form>
@endsection

@section('footer')
<script>
  CKEDITOR.replace( 'content' );
</script>
@endsection