<div class="col-lg-4 col-md-6 service-item">
    <a class="text-black" href="{{route("services")}}" wire:navigate>
        <div class="block"> <span class="colored-box text-center h3 mb-4">{{$key + 1}}</span>
            <h3 class="mb-3 service-title">{{$service?->title}}</h3>
            <p class="mb-0 service-description">{{$service->short_desc}}</p>
        </div>
    </a>
</div>