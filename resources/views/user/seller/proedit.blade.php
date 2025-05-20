<x-panel>

    <form  action="{{ route('product.update',$product) }}" enctype="multipart/form-data" id="form" method="post">
        @csrf
        @method('PUT')
        <label class="mt-3" for="name">نام محصول</label>
        <input value="{{$product->name}}" class="form-control" type="text" name="name">
        @error('name')
            <p class="alert alert-danger">{{ $message }}</p>
        @enderror
        <label class="mt-3" for="content">توضیحات</label>
        <textarea  class="form-control" name="content" cols="30" rows="10">{{$product->content}}</textarea>
        @error('content')
            <p class="alert alert-danger">{{ $message }}</p>
        @enderror
        <label class="mt-3" for="price">قیمت</label>
        <input value="{{$product->price}}" class="form-control" type="text" name="price">
        @error('price')
            <p class="alert alert-danger">{{ $message }}</p>
        @enderror
        <label class="mt-3" for="inventory">موجودی انبار</label>
        <input value="{{$product->inventory}}" min="2" class="form-control" type="number" name="inventory">
        @error('inventory')
            <p class="alert alert-danger">{{ $message }}</p>
        @enderror
        <label class="mt-3" for="cover">تصویر</label>
        <input type="file" name="cover">
        <button class="btn btn-primary mt-3 form-control">ویرایش</button>
    </form>

</x-panel>
