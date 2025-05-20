<x-layout>
    <body class="register">
    <form method="post" class="register-form">
        @csrf
        <label for="">ایمیل:</label>
        <input value="{{old('email')}}" type="email" class="form-control" name="email">
        @error('email')
        <p class="alert alert-danger">
            {{$message}}
        </p>
    @enderror
        <label for="">گذرواژه:</label>
        <input type="password" class="form-control" name="password">
        @error('password')
        <p class="alert alert-danger">
            {{$message}}
        </p>
    @enderror
        <button>ورود</button>
        @error('Nomach')
            <p class="alert alert-danger">
                {{$message}}
            </p>
        @enderror
 
    </form>
    </body>
</x-layout>