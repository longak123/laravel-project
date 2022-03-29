@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width:50px"> ID</th>
                <th style="width:200px">Tên sản phẩm</th>
                <th style="width:150px">Danh mục</th>
                <th >Gía</th>
                <th>Anh</th>
                <th ></th>

            </tr>
        </thead>
        <tbody>


                @foreach($products as $key =>$product)
                <tr>
                <td> {{$product->id}}</td>
                <td> {{$product->name}}</td>
                <td> {{$product->menu->name}}</td>
                <td> {{$product->price}}</td>
                <td> <img src="{{url($product->thumb)}}"style="height: 100px; width: 150px;">       </td>

                <td >
                    <a class = "btn btn-primary" href="/admin/products/edit/{{$product->id}}">
                    Sửa sản phẩm
                    </a>
                    <a class = "btn btn-danger" onclick="removeRow( {{$product->id}},'/admin/products/destroy')">
                        Xóa sản phẩm
                        </a>
                    
                </td>
                </tr>
                @endforeach
            </tbody>
    </table>

    {{!! $products->Links()!!}}
 
@endsection