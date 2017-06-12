@extends('admin.master')

@section('main_content')
    <div class="row">
        <div class="col-md-8">
            <ul id="tree1">
                @foreach($categories as $category)
                    <li>
                        {{ $category->name }}
                        <i onclick="window.location='{{ route("categories.show", ['id' => $category->id]) }}'"
                           class="fa fa-plus" aria-hidden="true"></i>
                        <i onclick="window.location='{{ route("categories.edit", ['id' => $category->id]) }}'"
                           class="fa fa-pencil" aria-hidden="true"></i>
                        @if(count($category->childs))
                            @include('admin.categories.manageChild',['childs' => $category->childs])

                        @else
                            <form action="/admin/categories/{{$category->id}}" style="display: inline" method="Post">
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}
                                <button type="submit"><i class="fa fa-minus" aria-hidden="true"></i>
                                </button>
                            </form>
                        @endif
                    </li>
                @endforeach
                <i onclick="window.location='{{ route("categories.show", ['id' => 0]) }}'" class="fa fa-plus"
                   aria-hidden="true"></i>
            </ul>
        </div>
    </div>
@stop
