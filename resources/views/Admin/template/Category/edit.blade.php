@include('Admin.components.header')
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
              <div class="col-12">
                <div class="row row-cards">


                    <div class="col-md-10">
                        <form class="card" id="categoryForm" method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data" >
                              @csrf
                            @method('PUT')
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Kategori Düzenle</h3>
                            <a href="{{ route('categories.index') }}" class="btn btn-square btn-success">
                               Listesi
                            </a>
                        </div>
                      
                        <div class="card-body">
                            <div class="row">

                              <div id="formErrors"></div>

                                @if(session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                    <div class="mb-3">
                                        <label>Mevcut Görsel</label><br>
                                        @if($category->image)
                                            <img src="{{ asset('uploads/category/'.$category->image) }}"
                                                width="120"
                                                class="mb-2">
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label>Yeni Görsel (Opsiyonel)</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                    <label class="form-label">Başlık</label>
                                    <input type="text" class="form-control sefTitle"  id="sef-title" name="title" value="{{ old('title', $category->title) }}" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                    <label class="form-label">Slug</label>
                                    <input type="text" class="form-control" name="slug" id="seflink" value="{{ old('title', $category->slug) }}" >
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Kısa Açıklama</label>
                                        <textarea class="form-control" name="short_description" rows="3">{{ old('short_description', $category->short_description) }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                    <label class="form-label">Sıra Numarası</label>
                                    <input type="number" class="form-control" name="sort" value="{{ old('title', $category->sort) }}" >
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="form-label">Kategori Durumu</div>
                                        <div>
                                            <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="is_active"  @checked((int) old('is_active', $category->is_active) === 1) value="1" >
                                            <span class="form-check-label">Aktif</span>
                                            </label>
                                            <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="is_active" @checked((int) old('is_active', $category->is_active) === 0) value="0" >
                                            <span class="form-check-label">Pasif</span>
                                            </label>
                                          
                                        </div>
                                    </div>
                                </div>


                           </div>
                           
                           
                            <div class="text-end">
                            <button type="submit" class="btn btn-primary">Kaydet</button>
                            </div>
                        </div>
                        </form>
                    </div>


                </div>
              </div>
            </div>
          </div>
        </div>



@include('Admin.components.footer')