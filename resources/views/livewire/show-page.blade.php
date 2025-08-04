<div>

    <section class="section">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-7">
                    <div class="section-title">
                        <p class="text-primary text-uppercase fw-bold mb-3">{{$page->title}}</p>
                        <h2 class="h1 mb-4">Lorum ipsum doller</h2>
                        <div class="content pe-0 pe-lg-5">
                            {!! $page->content !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <img loading="lazy" decoding="async" src="{{asset("storage/" . $page->image)}}"
                        alt="Business Loans &lt;br&gt; For Daily Expenses" class="rounded w-100">
                </div>
            </div>
        </div>
    </section>






</div>