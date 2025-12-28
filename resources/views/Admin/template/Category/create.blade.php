@include('Admin.components.header')
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
              <div class="col-12">
                <div class="row row-cards">


                    <div class="col-md-10">
                        <form class="card" id="categoryForm" method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data" >
                            @csrf
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Kategori Ekle</h3>
                                <a href="{{ route('categories.index') }}" class="btn btn-square btn-success">
                                Listesi
                                </a>
                            </div>
                      
                        <div class="card-body">
                            <div class="row">

                              <div id="formErrors"></div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" >Kategori Görseli</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                    <label class="form-label">Başlık</label>
                                    <input type="text" class="form-control sefTitle" id="sef-title" name="title" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                    <label class="form-label">Slug</label>
                                    <input type="text" class="form-control" id="seflink" name="slug" >
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Kısa Açıklama</label>
                                        <textarea class="form-control" name="short_description" rows="3"  ></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                    <label class="form-label">Sıra Numarası</label>
                                    <input type="number" class="form-control" name="sort"  >
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="form-label">Kategori Durumu</div>
                                        <div>
                                            <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="is_active"  value="1" >
                                            <span class="form-check-label">Aktif</span>
                                            </label>
                                            <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="is_active" value="0" >
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