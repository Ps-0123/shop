<x-layout>

    <body class="register">
        <form method="post" class="register-form">
            @csrf
            <label for="f-name">نام :</label>
            <input type="text" class="form-control" name="f-name">
            @error('f-name')
            <p class="alert alert-danger">
                {{$message}}
            </p>
        @enderror
            <label for="l-name">نام خانوادگی:</label>
            <input type="text" class="form-control" name="l-name">
            @error('l-name')
            <p class="alert alert-danger">
                {{$message}}
            </p>
        @enderror
            <label for="email">ایمیل:</label>
            <input type="text" class="form-control" name="email">
            @error('email')
            <p class="alert alert-danger">
                {{$message}}
            </p>
        @enderror
            <label for="mobile">شماره تلفن:</label>
            <input type="text" class="form-control" name="mobile">
            @error('mobile')
            <p class="alert alert-danger">
                {{$message}}
            </p>
        @enderror
            <label for="password">گذرواژه:</label>
            <input type="text" class="form-control" name="password">
            <label for="password_confirmation">تکرار گذرواژه:</label>
            <input type="text" class="form-control" name="password_confirmation">
            @error('password')
            <p class="alert alert-danger">
                {{$message}}
            </p>
        @enderror
            <button>ثبت نام</button>
        </form>
    </body>
</x-layout>
