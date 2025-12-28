@include('Front.components.header')

        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
             
              <div class="col-12">
                <div class="row row-cards">

                    <div class="col-lg-12">
                        <div class="card">
                        <div class="row row-0">

                            <div class="col">
                                <div class="card-body">
                                        <img src="{{ asset('uploads/category/' . ($category->image ?? 'categories_image.png')) }}" class="w-100 h-100 object-cover card-img-start" alt="Beautiful blonde woman relaxing with a can of coke on a tree stump by the beach">
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $category->title }}</h3>
                                    <p class="text-secondary">
                                   {{ $category->short_description }}
                                    </p>
                                </div>
                        
                            </div>
                           
                        </div>
                        </div>
                    </div>

                    @foreach($blogs as $blog)
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <a href="{{ route('blog.detail', [$category->slug, $blog->slug]) }}" class="text-decoration-none text-reset">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $blog->title }}</h3>
                                    <p class="text-secondary">
                                    {{ Str::limit($blog->content, 100) }}
                                    </p>
                                </div>
                                <div class="progress progress-1 progress-sm card-progress">
                                    <div class="progress-bar" style="width: 38%" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" aria-label="38% Complete">
                                    <span class="visually-hidden">38% Complete</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach

                    <div class="d-flex justify-content-center mt-4">
                        {{ $blogs->links() }}
                    </div>
               
                </div>
                
              </div>
           
            </div>
          </div>
        </div>
@include('Front.components.footer')