<ul>
   @foreach($childs as $child)
   <li>
      {{ $child->name }}
      <a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
      <a href="#">a</a>
      @if(count($child->childs))
      @include('admin.categories.manageChild',['childs' => $child->childs])
      @endif
   </li>
   @endforeach
</ul>
