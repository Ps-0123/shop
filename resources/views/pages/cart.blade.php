<x-layout title="سبد خرید">
    @php
        $num = 0;
    @endphp

    <body class="cart">
        <div class="container mt-5">
            <div class="w-75 me-auto mx-auto">
                @if (count($carts) == 0)
                    <div class="alert alert-info text-center">
                        سبد خرید شما خالی است
                    </div>
                @else
                    <div class="row">
                        @foreach ($carts as $cart)
                            <div
                                class="col-12 col-sm-12 col-md-6 col-lg-10 col-xl-10 text-center mt-3 border me-auto mx-auto bg-white">
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                            <img width="100%" src="{{ asset('storage/' . $cart->product->cover) }}"
                                                alt="">
                                        </div>
                                        <div class="col-10 mt-auto mb-auto col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                            {{ $cart->product->name }}
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                            <input min="1" value="1" price="{{ $cart->product->price }}"
                                                onchange="price(this,{{ ++$num }})" class="text-center"
                                                type="number" name="count" max="{{ $cart->product->inventory }}"
                                                id="">
                                        </div>
                                        <div id="price{{ $num }}"
                                            class="col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 text-center">
                                            {{ $cart->product->price }} تومان
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div
                            class="col-12 col-sm-12 col-md-6 col-lg-10 col-xl-10 text-center mt-3 border me-auto mx-auto bg-white">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-3">
                                    <p id="result"></p>

                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 pt-2 me-auto">
                                    <a class="btn btn-primary w-75" href="">پرداخت</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>


</x-layout>
<script>result();</script>
