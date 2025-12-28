@include('Admin.components.header')
     
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
              <div class="col-12">
                <div class="row row-cards">

                  <div class="col-sm-6 col-lg-6">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-category-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4h6v6h-6zm10 0h6v6h-6zm-10 10h6v6h-6zm10 3h6m-3 -3v6" /></svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              Kategori Sayısı
                            </div>
                            <div class="text-muted">
                             {{ $categoryCount }}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6 col-lg-6">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-article"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" /><path d="M7 8h10" /><path d="M7 12h10" /><path d="M7 16h10" /></svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              Blog Sayısı
                            </div>
                            <div class="text-muted">
                               {{ $blogCount }}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
 

                </div>
              </div>
             
            </div>
          </div>
        </div>

@include('Admin.components.footer')