@include('Front.components.header')
      
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
             
              <div class="col-12">
                <div class="row row-cards">

                  @forelse($categories as $category)
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                          <a href="{{ route('blog.list', $category->slug) }}" class="text-decoration-none text-reset">
                            <div class="img-responsive img-responsive-21x9 card-img-top" style="background-image: url({{ asset('uploads/category/' . ($category->image ?? 'categories_image.png')) }})"></div>
                            <div class="card-body">
                                <h3 class="card-title">{{ $category->title }}</h3>
                                <p class="text-secondary">
                                {{ Str::limit($category->short_description, 100) }}
                                </p>
                            </div>
                          </a>
                        </div>
                    </div>
                  @empty
                  <div class="col-12 text-center py-5">
                    <p class="text-secondary">Henüz bir kategori eklenmemiş.</p>
                  </div>
                  @endforelse
                  <div class="d-flex justify-content-center mt-4">
                    {{ $categories->links() }}
                  </div>
                </div>
                
              </div>
           
            </div>
          </div>
        </div>

@include('Front.components.footer')