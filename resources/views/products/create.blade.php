@extends('layoutAdmin')
@section('title')
    Thêm mới sản phẩm
@endsection
@section('content')
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="name" class="form-control" name="name" placeholder="Nguyen Van D" value="{{old('name')}}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" class="form-control" name="price" placeholder="10000" value="{{old('price')}}">
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="text" class="form-control" name="quantity" placeholder="100" value="{{old('quantity')}}">
            @error('quantity')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select form-select-lg mb-3" name="category_id">
                @foreach ($listCate as $category)
                <option value="{{$category->id}}" @if ($category->id == old('category_id')) selected @endif>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Gửi</button>

    </form>
    <a class="btn btn-light" href="{{route('products.index')}}">Quay lại trang chủ</a>
@endsection