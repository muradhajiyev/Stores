<ul>
    @foreach($childs as $child)
        <li>
            {{ $child->name }}
            <i onclick="window.location='{{ route("categories.show", ['id' => $child->id]) }}'" class="fa fa-plus"
               aria-hidden="true"></i>
            <i onclick="window.location='{{ route("categories.edit", ['id' => $child->id]) }}'" class="fa fa-pencil"
               aria-hidden="true"></i>
            @if(count($child->childs))
                @include('admin.categories.manageChild',['childs' => $child->childs])
            @else
                <form action="/admin/categories/{{$child->id}}" style="display: inline" method="Post">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <button type="submit"><i class="fa fa-minus" aria-hidden="true"></i></button>
                </form>
            @endif
        </li>
    @endforeach
</ul>
