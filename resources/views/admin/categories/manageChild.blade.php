<ul>
    @foreach($childs as $child)
        <li>
            {{ $child->name }}
            <i onclick="window.location='{{ route("categories.create", ['id' => $child->id]) }}'" class="fa fa-plus"
               aria-hidden="true"></i>
            @if(count($child->childs))
                @include('admin.categories.manageChild',['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>
