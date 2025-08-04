<div>
    <div class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="mb-5">
                        <h2 class="mb-4" style="line-height:1.5">{{$blog->title}}</h2>
                        <span>{{\Carbon\Carbon::parse($blog->created_at)->format("d M, Y")}} <span class="mx-2">/</span>
                        </span>
                        <p class="list-inline-item">Category : <a href="#!" class="ml-1">{{$blog->category->name}} </a>
                        </p>
                        <p class="list-inline-item">Autor : <a href="#">{{ $blog->author }}</a></p>

                        </p>
                    </div>
                    @if($blog->image != "")
                        <div class="mb-5 text-center">
                            <div class="post-slider rounded overflow-hidden">
                                <img loading="lazy" decoding="async" src="{{asset('storage/' . $blog->image)}}"
                                    alt="{{$blog->title}}">

                            </div>
                        </div>
                    @endif
                    <div class="content">
                        {!! $blog->content !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>