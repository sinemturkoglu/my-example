@include('Admin.components.header')
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
              <div class="col-12">
                <div class="row row-cards">


                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Kategori Listesi</h3>
                            <a href="{{ route('categories.create') }}" class="btn btn-square btn-success">
                               Ekle
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Kategori Adı</th>
                                <th>Açıklama</th>
                                <th>Durum</th>
                                <th>Sıra</th>
                                <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @forelse ($categories as $category)
                                <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td class="text-secondary">{{ $category->short_description }}</td>

                                <td class="text-secondary">
                                    <span class="col-auto">
                                    <label class="form-check form-check-single form-switch">
                                      <input class="form-check-input activeCategory" id="{{$category->id}}" name="status" @if($category->is_active == 1) checked @endif  type="checkbox" >@csrf
                                    </label>
                                  </span>
                                </td>

                                <td class="text-secondary">{{ $category->sort }}</td>
                                <td>
                                    <div class="btn-list flex-nowrap">
                                       
                                        <a href="{{ route('categories.edit', $category->id) }}" >Düzenle</a>
                                        <!-- <form action="{{ route('categories.destroy', $category->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Bu kategoriyi silmek istediğinize emin misiniz?')"
                                            style="display:inline-block">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Sil
                                            </button>
                                        </form> -->

                                          <form class="delete-category-form" 
                                            action="{{ route('categories.destroy', $category->id) }}"
                                            method="POST"
                                            style="display:inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm delete-category-btn">
                                                <i class="fas fa-trash"></i> Sil
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
                           {{ $categories->links() }}
                    </div>


                </div>
              </div>
            </div>
          </div>
        </div>


 

@include('Admin.components.footer')