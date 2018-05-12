<div class="top-search">
  <div id="search">
    <form method="POST" action="{{ route('search') }}">
      {{ csrf_field()}}
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Type a product name" name="search" required>
        <select class="cate-dropdown hidden-xs hidden-sm" name="type">
          <option value="0">All Categories</option>
          @foreach ($categories as $category)
              <option>{{ $category->name }}</option>
                  @foreach ($subcategories as $subcategory)
                      @if($subcategory->category_id == $category->id)
                      <option value="{!! $category->id !!}|{!! $subcategory->id !!}">&nbsp;&nbsp;&nbsp;{{ $subcategory->name }}</option>
                      @endif
                  @endforeach
          @endforeach
          </select>
        <button class="btn-search" type="submit"><i class="fa fa-search"></i></button>
      </div>
    </form>
  </div>
</div>
