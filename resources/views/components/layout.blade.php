@props(['title'=>env('APP_NAME')])
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$title}}</title>
  @vite(['resources/css/bootstrap.min.css','resources/css/style.css','resources/js/app.js'])
</head>

<nav class="menu">

    <div class="container">
      <div class="row">
        <ul class="col-10">

          <li><a href="{{route('home')}}">خانه</a></li>
          @guest
          <li><a href="{{route('register')}}">ثبت نام</a></li>
          <li><a href="{{route('login')}}">ورود</a></li>
          @endguest
          <li><a href="">فروشگاه</a></li>
          @auth
          <li><a href="{{route('dashboard')}}">داشبورد</a></li>
            
          <li>
            <form action="{{route('logout')}}" method="post">
              @csrf
              <button class="btn text-white fw-bold">خروج</button>
            </form>
          </li>
          @endauth
        </ul>
        <ul class="col-2">
          <li> <a href="{{route("cart.index")}}">سبد خرید</a></li>

        </ul>
      </div>
    </div>
  </nav>
{{$slot}}
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.js')}}"></script>
<script src="{{asset('js/all.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
</html>
