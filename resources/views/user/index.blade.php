<x-panel>

    <form action="" id="form" method="post">
        <label class="mt-3" for="name">نام و نام خانوادگی</label>
        <input value="{{ Session('user')->name }}" readonly class="form-control" type="text" name="name">
        <label class="mt-3" for="name">ایمیل</label>
        <input value="{{ Session('user')->email }}" readonly class="form-control" type="text" name="name">
        <label class="mt-3" for="name">شماره تلفن</label>
        <input value="{{ Session('user')->mobile }}" maxlength="11" readonly class="form-control" type="text" name="name">
        <label class="mt-3" for="name">گذرواژه</label>
        <input value="گذرواژه" readonly class="form-control" type="text" name="name">
        <a class="btn btn-primary mt-3 form-control" onclick="Edit(this)">ویرایش</a>
    </form>

</x-panel>
