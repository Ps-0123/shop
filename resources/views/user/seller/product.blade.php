<x-panel>
    <form  action="{{ route('product.store') }}" enctype="multipart/form-data" id="form" method="post">
        @csrf
        <label class="mt-3" for="name">نام محصول</label>
        <input value="{{old('name')}}" class="form-control" type="text" name="name">
        @error('name')
            <p class="alert alert-danger">{{ $message }}</p>
        @enderror
        <label class="mt-3" for="content">توضیحات</label>
        <textarea  class="form-control" name="content" cols="30" rows="10">{{old('content')}}</textarea>
        @error('content')
            <p class="alert alert-danger">{{ $message }}</p>
        @enderror
        <label class="mt-3" for="price">قیمت</label>
        <input value="{{old('price')}}" class="form-control" type="text" name="price">
        @error('price')
            <p class="alert alert-danger">{{ $message }}</p>
        @enderror
        <label class="mt-3" for="inventory">موجودی انبار</label>
        <input value="{{old('inventory')}}" min="2" class="form-control" type="number" name="inventory">
        @error('inventory')
            <p class="alert alert-danger">{{ $message }}</p>
        @enderror
        <label class="mt-3" for="cover">تصویر</label>
        <input type="file" name="cover">
        <button class="btn btn-primary mt-3 form-control">انتشار</button>
    </form>
    @if (count($products))
    <hr class="mt-3 mb-3">
    <table class="table">
        <thead>
            <tr class="text-center">
                <th scope="col">Name</th>
                <th scope="col">Content</th>
                <th scope="col">price</th>
                <th scope="col">inventory</th>
                <th scope="col">cover</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->short_content() }}</td>
                    <td>{{ $product->fa_num() }}</td>
                    <td>{{ $product->inventory }}</td>
                    <td><img width="100px" src="{{asset("storage/".$product->cover)}}" alt="no"></td>
                    <td><a class="btn btn-warning mb-1" href="{{route('product.edit',$product->id)}}">ویرایش</a> 
                    <form action="{{route('product.destroy',$product->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    @endif

</x-panel>
