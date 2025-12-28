@include('Admin.components.header')
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
              <div class="col-12">
                <div class="row row-cards">


                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Blog Listesi</h3>
                            <a href="{{ route('blog.create') }}" class="btn btn-square btn-success">
                               Ekle
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Blog</th>
                                 <th>Kategoriler</th>
                                <th>Açıklama</th>
                                <th>Durum</th>
                                <th>Sıra</th>
                                <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @forelse ($blogs as $blog)
                                <tr>
                                <td>{{ $blog->id }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>
                                    @if($blog->categories->count() > 0)
                                        @foreach($blog->categories as $category)
                                            <span class="badge bg-blue-lt me-1 mb-1">
                                                {{ $category->title }}
                                            </span>
                                        @endforeach
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-secondary">
                                   {{ Str::limit($blog->content, 200) }}    
                                </td>

                                <td class="text-secondary">
                                    <span class="col-auto">
                                    <label class="form-check form-check-single form-switch">
                                      <input class="form-check-input activeBlog" id="{{$blog->id}}" name="status" @if($blog->is_active == 1) checked @endif  type="checkbox" >@csrf
                                    </label>
                                  </span>
                                </td>

                                <td class="text-secondary">{{ $blog->sort }}</td>
                                <td>
                                    <div class="btn-list flex-nowrap">
                                       
                                        <a href="{{ route('blog.edit', $blog->id) }}" >Düzenle</a>
                                        <form action="{{ route('blog.destroy', $blog->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Bu blogu silmek istediğinize emin misiniz?')"
                                            style="display:inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Sil
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                            </table>
                        </div>
                      
                        </div>
                           {{ $blogs->links() }}
                    </div>


                </div>
              </div>
            </div>
          </div>
        </div>


 

@include('Admin.components.footer')