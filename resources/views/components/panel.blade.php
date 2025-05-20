<x-layout>

    <body class="dashboard" onload="Selector()">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center">
                    <h5 class="text-end me-3 fw-bold mb-3">{{session('user')->name}}</h5>
                    <div class="content">
                        <ul>
    
                        <a class="a d-block" href="{{route('dashboard')}}">پروفایل من</a>
                        @if(Session('user')->role == 1)
                        <a class="a d-block" href="{{route('admin_product')}}">مدیریت محصولات</a>
                        <a class="a d-block" href="{{route('admin_users')}}">مدیریت کاربران</a>
                        @endif
                        @if (isset($_COOKIE['product']))
                        <a target="_blank" class="a d-block" href="{{route('product.show',$_COOKIE['product'])}}">آخرین بازدید</a>
                        @endif
                        <a class="a d-block" href="#">سفارش ها</a>
                        <a class="a d-block" href="{{route('Admin-comment')}}">نظرات</a>
                        <a class="a d-block" href="">تیکت ها</a>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                    <div class="content mt-5 p-5">
                        {{$slot}}

                    </div>
                </div>
            </div>
        </div>
    </body>
    </x-layout>
