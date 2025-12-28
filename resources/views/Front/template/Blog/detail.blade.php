@include('Front.components.header')
      
        <div class="page-body">
          <div class="container-xl">

                    <div class="row g-2 align-items-center mb-3">
                        <div class="col">
                            <div class="page-pretitle">{{ $category->title }}</div>
                            <h2 class="page-title">{{ $blog->title }}</h2> 
                        </div>

                        <div class="col-auto ms-auto d-print-none">
                            <div class="d-flex align-items-center">
                                <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">

                                    <li class="breadcrumb-item">
                                        <a href="{{ route('index') }}" class="text-dark ">Kategoriler</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <a href="{{ route('blog.list', $category->slug) }}" class="text-dark ">{{ $category->title }}</a>
                                    </li>
                                     <li class="breadcrumb-item active" aria-current="page">
                                        <a href="#" class="text-dark">{{ $blog->title }}</a>
                                    </li>

                                </ol>
                               
                            </div>
                        </div>
                       
                    </div>

             
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-xl-12">
                            <div class="card card-lg">
                            <div class="card-body markdown">
                                <h1>{{ $blog->title }}</h1>
                                <p>
                                    {{ $blog->content }}
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>


          </div>
        </div>

@include('Front.components.footer')