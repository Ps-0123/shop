<x-panel>
    @if (count($comments)==0)
        <div class="alert alert-primary text-center">کامنتی جهت نمایش وجود ندارد!</div>
    @else
        
    <table class="table">
        <thead>
          <tr>
            <th scope="col">نویسنده</th>
            <th scope="col">نوشته</th>
            <th scope="col">وضعیت</th>
            <th scope="col">عملیات</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment) 
            <tr>
                <td>{{$comment->user_id==0 ? 'کاربر مهمان ': optional($comment->writer)->name}}</td>
                <td>{{$comment->content}}</td>
                <td>

                  @if($comment['status']==1)
                  تایید شده
                  @elseif ($comment['status']==2)
                  ردشده
                  @else
                  در انتظار
                  @endif

                </td>
                <form action="" method="post">
                  
                </form>
                <td>
                  <div class="d-flex">
                  <form action="{{route('comment.update',$comment->id)}}" method="post">
                    @csrf
                    @method("PUT")
                    <input type="hidden" name="action" value="2">
                    <button title="رد کامنت" class="btn btn-secondary" href=""><i class="fa fa-times"></i> </button>

                  </form>
                  <form action="{{route('comment.update',$comment->id)}}" method="post">
                    @csrf
                    @method("PUT")
                    <input type="hidden" name="action" value="1">
                    <button title="تایید کامنت" class="btn btn-success" href=""><i class="fa fa-check"></i> </button>
                  </form>
                  <form action="{{route('comment.destroy',$comment->id)}}" method="get">
                    @method("DELETE")
                    @csrf
                    <button title="حذف کامنت" class="btn btn-danger" href=""><i class="fa fa-trash"></i></button>
                  </form>
                </div>
                  
                </td>
        </tr>
        @endforeach
        </tbody>
      </table>
    @endif

</x-panel>