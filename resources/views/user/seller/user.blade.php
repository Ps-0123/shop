<x-panel>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">نام </th>
            <th scope="col">ایمیل</th>
            <th scope="col">شماره تلفن</th>
            <th scope="col">نقش کاربر</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->mobile}}</td>
                <td><div class="btn btn-primary text-white">{{$user->role()}}</div></td>
            </tr>
            @endforeach
        </tbody>
      </table>
</x-panel>