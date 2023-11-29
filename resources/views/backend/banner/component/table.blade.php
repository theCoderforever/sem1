
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Name</th>
        <th class="text-center">Image</th>
        <th class="text-center">Avatar</th>
        <th class="text-center">{{__('messages.tableAction')}}</th>
    </tr>
    </thead>
    <tbody>

     @foreach($banner as $key)
    <tr>
        <td class="text-center">{{$loop->iteration}}</td>
        <td class="text-center">{{$key->name}}</td>
        <td class="text-center"><img src="{{asset('/storage/image/'.$key->image)}}" width="100px" alt=""></td>
        <td class="text-center"><img src="{{asset('/storage/image/'.$key->avatar)}}" width="100px"  alt=""></td>
        <td class="text-center">
            <a name="" id="" class="btn btn-success" href="{{route('banner.edit', $key->id)}}" role="button"><i class="fa fa-edit"></i></a>
            <a name="" id="" class="btn btn-danger" href="{{route('banner.delete', $key->id)}}" role="button"><i class="fa fa-trash"></i></a>

        </td>
    </tr>
    @endforeach

    {{-- @endif --}}
   
  
    </tbody>
</table>

{{-- {{$banner->links('pagination::bootstrap-4')}} --}}