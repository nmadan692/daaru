<div class="blog__sidebar__item">
    <h4>Categories</h4>
    <ul>
        @foreach($blogCategory  as $blogCategory)
            <li><a href="#">{{ $blogCategory->name }}</a></li>
        @endforeach
    </ul>
</div>
