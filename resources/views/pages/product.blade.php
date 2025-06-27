<x-layout title="{{ $product->name }}">

    <body class="product">


        <div class="container">
            <div class="back-white">
                <a href="">{{ $product->name }}</a>/<a href="">دسته بندی</a>
                <div class="row dir-ltr">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="content p-5">
                            <img id="product-img" width="100%"
                                @if ($product->cover != null) src="{{ asset('storage/' . $product->gallery()[0]) }}"
                            @else
                            src="{{ asset('storage/Product_images/noimage.jpg') }}" @endif>
                            <div class="container">
                                <div class="row">
                                    @foreach (array_slice($product->gallery(), 1) as $image)
                                        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                            <img onclick="gallery(this)" class="other-img" width="100%"
                                                src="{{ asset('storage/' . $image) }}"
                                                alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <hr class="mt-4 mb-4">
                            <div class="text-center">
                                <!-- ///////////////////موجودی انبار///////////// -->
                                @if ($product->inventory == 1)
                                    <span class="text-danger">
                                        <i class="fa-solid fa-box-open"></i>
                                        ۱ عدد در انبار باقی مانده </span>
                                @elseif ($product->inventory > 1)
                                    <span class="text-success">
                                        <i class="fa-solid fa-box-open"></i>

                                        مــوجــود در انـبـار</span>
                                @elseif ($product->inventory == 0)
                                    <span class="text-primary"><i class="fa-solid fa-box-open"></i>

                                        نا موجود در انبار</span>
                                @endif


                                <!-- ///////////////////موجودی انبار///////////// -->

                                <h6 class="mt-2"> {{ $product->fa_num() }} تومان</h6>
                            </div>
                            @auth
                                @if (!count($product->Cart))
                                    <form action="{{ route('cart.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product" value="{{ $product->id }}">
                                        <button class="add-cart">
                                            <i class="fa fa-cart-plus" aria-hidden="true"></i>

                                            افزودن به سبد خرید</button>
                                    </form>
                                @else
                                    <form action="{{ route('cart.destroy', $product->Cart[0]->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="add-cart">
                                            <i class="fa fa-cart-plus" aria-hidden="true"></i>

                                            حذف از سبد خرید</button>
                                    </form>
                                @endif
                            @endauth

                            @guest
                                <a href="{{ route('login') }}">
                                    <button class="add-cart">
                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>

                                        افزودن به سبد خرید</button>
                                </a>
                            @endguest
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-8 col-xl-8">
                        <div class="content p-5">


                            <h1 class="mb-4">
                                {{ $product->name }}
                            </h1>

                            <span>نظرات کاربران: </span> <a href="#comment">{{ count($comments) }} نظر</a>
                            <hr class="mb-5 mt-3 w-50">
                            <p>
                                {{ $product->content }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <form action="{{ route('comment.store') }}" method="Post">
                    @csrf
                    <textarea name="comment" class="form-control border-primary"
                        placeholder="خوشحال میشم اگر تجربتون از استفاده این محصول رو در اختیار ما قرار بدید"></textarea>
                    <div class="w-50 me-auto ms-auto">
                        <button class="mt-1 btn border-success form-control">ثبت نظر جدید</button>
                    </div>
                    <input type="hidden" name="product" value="{{ $product->id }}">
                </form>
                <hr class="mt-2 mb-3" id="comment">
                @foreach ($comments as $comment)
                    <div class="comment p mb-2">
                        <h6><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>
                            <div class="me-2">
                                @if ($comment->user_id != 0)
                                    {{ $comment->writer->name }} :
                                @else
                                    کاربر مهمان
                                @endif
                            </div>
                        </h6>
                        <hr>
                        <p>
                            {{ $comment->content }}
                        </p>
                    </div>
                @endforeach

            </div>
        </div>
    </body>
</x-layout>
