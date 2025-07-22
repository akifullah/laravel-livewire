<div class="card bg-transparent border-0 text-center">
    <div class="card-img" style="height: 200px">
        <img loading="lazy" decoding="async" src="{{asset("./storage/" . $team->image)}}" alt="Scarlet Pena"
            class="rounded w-100" width="300" height="332">
        <ul class="card-social list-inline">
            <li class="list-inline-item"><a class="facebook" href="#"><i class="fab fa-facebook"></i></a>
            </li>
            <li class="list-inline-item"><a class="twitter" href="#"><i class="fab fa-twitter"></i></a>
            </li>
            <li class="list-inline-item"><a class="instagram" href="#"><i class="fab fa-instagram"></i></a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <h3>{{$team->name}}</h3>
        <p>{{$team->designation}}</p>
    </div>
</div>