@extends('layouts.app')

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner">
            @foreach($ads as $ad)
                <div class="carousel-item {{$loop->first?'active':''}}">
                    <a href="{{$ad->url}}">
                        <img src="/storage/storage/ads/{{$ad->image}}" class="d-block w-100" alt="{{$loop->index	}}">
                    </a>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container ">

        <h1 class="my-4 text-center">Latest News</h1>

        <div class="row">

            @foreach($news as $article)
                <div class="col-lg-4 mb-4">
                    <div class="card border-success h-100">
                        <h4 class="card-header">{{$article->title}}</h4>
                        <div class="card-body">
                            <a href="{{route("news.show",["id"=>$article->id])}}">
                                <img class="img-fluid rounded mb-3" src="/storage/storage/news/{{$article->image}}"
                                 alt=""></a>
                            <p class="card-text">{{\Illuminate\Support\Str::limit($article->body, 300)}}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route("news.show",["id"=>$article->id])}}" class="btn btn-primary float-right">See
                                More</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <h2 class="my-4 text-center">New Items</h2>

        <div class="row">
            @foreach($items as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-danger h-100">
                        <a href="/item/{{$item->id}}">
                            <img class="card-img-top" src="/storage/storage/items/{{$item->image}}" alt=""
                                 height="300" width="150">
                        </a>
                        <div class="card-body">
                            <h4 class="text-secondary card-title">
                                <a class="text-secondary" style="text-decoration: none"
                                   href="/item/{{$item->id}}">{{$item->name}}</a>
                            </h4>
                            @if($item->discount==0)
                                <h5>{{$item->price}} JD</h5>
                                @if($item->short_description!=null)
                                    <small class="text-success">{{$item->short_description}}</small>
                                @endif
                            @else
                                <h5 style="text-decoration: line-through">{{$item->price}}
                                    JD</h5>
                                <h5 style=" color: red">{{$item->price-$item->price*$item->discount/100}}
                                    JD</h5>
                                @if($item->short_description!=null)
                                    <small class="text-success">{{$item->short_description}}</small>
                                @else
                                    <small class="text-danger">You save {{$item->discount}} %</small>
                                @endif

                            @endif

                        </div>
                        <div class="card-footer ">
                            <div class="row justify-content-around">
                                @if($item->status==="Available")
                                    <form class=" " method='post' action='{{route('card.store')}}'>
                                        @csrf
                                        <input type="hidden" value="1" name="quantity">
                                        <input type="hidden" value="{{$item->id}}" name="item_id">
                                        <button type="submit" class="btn btn-sm btn-outline-success"><i
                                                class="fas fa-cart-plus"></i> Add to Cart
                                        </button>
                                    </form>
                                @else
                                    <small class="text-muted m-1">{{$item->status}}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h2>About US</h2>
                <p>The first site in Jordan specialized in IOT</p>
                <h2>Contact US</h2>
                @if(session("message"))
                    <div class="alert alert-success">
                        <p class="text-monospace text-center">{{session("message")}}</p>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{route("send_email")}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Enter Your Name</label>
                        <input type="text" name="name" class="form-control" value=""/>
                    </div>
                    <div class="form-group">
                        <label>Enter Your Email</label>
                        <input type="text" name="email" class="form-control" value=""/>
                    </div>
                    <div class="form-group">
                        <label>Enter Your Message</label>
                        <textarea name="message" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="send" class="btn btn-info float-right" value="Send"/>
                    </div>
                </form>

            </div>
            <div class="col-lg-6">
                <iframe width="600" height="400" id="gmap_canvas" class="embed-responsive-item"
                        src="https://maps.google.com/maps?q=Orange%20Coding%20Academy&t=&z=15&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
        </div>

    </div>

@endsection
