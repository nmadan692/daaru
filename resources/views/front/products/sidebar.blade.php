<side-bar :brands="{{ $brands }}" :categories="{{ $categories }}" :sub-categories="{{ $subCategories }}" :inputs="{{ request()->all() ? json_encode(request()->all()) : '{}' }}" ></side-bar>
