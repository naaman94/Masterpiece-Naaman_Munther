@extends('layouts.app')

@section('content')

    <div style="width:75%" class="container-fluid mt-5">
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
        <h1 class="mt-4 mb-3"><i class="fas fa-shopping-cart"></i> My Cart
        </h1>
        <div class="row">
            @if($cards->count()==0)
                <h1 class="col text-center">Your Cart is Empty </h1>
            @else
                <div class="col-xl-9">
                    @foreach($cards  as $card)
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <a href="/item/{{$card->item_id}}">
                                            <img class="img-fluid rounded"
                                                 src="/storage/storage/items/{{$card->item->image}}"
                                                 alt=""
                                                 height="300" width="400">
                                        </a>
                                    </div>
                                    <div class="col-lg-5">
                                        <h5>
                                            <a style="color:black; text-decoration: none"
                                               href="/item/{{$card->item->id}}">{{$card->item->name}}</a>
                                        </h5>
                                        <small>SKU : <span style="color:blue"> {{$card->item->sku}}</span></small>
                                        @if($card->item->short_description)
                                            <small class="d-block mt-2 text-success">{{$card->item->short_description}}</small>
                                        @elseif($card->item->discount!=0)
                                            <small class="d-block mt-2 text-danger">You
                                                save {{intval($card->item->discount)}} % </small>
                                        @endif
                                    </div>
                                    <div class="col-lg-3">
                                        <form class="row justify-content-center" id="edit_form{{$card->id}}"
                                              method="post"
                                              action="{{route('card.update',['id' => $card->id])}}">
                                            @method('PUT')
                                            @csrf
                                            <h5 class="col-4 " style="display: inline">
                                                qty:</h5>
                                            <input class="col-4 mb-3" type="number" id="qnt" value="{{$card->quantity}}"
                                                   onchange="changeQnt({{$card->id}})" name="quantity" max=100>
                                        </form>
                                        <script>function changeQnt(x) {
                                                console.log(x);
                                                let qnt = document.getElementById("qnt").value;
                                                if (qnt == 0) {
                                                    return confirm('Are you sure you want to delete {{$card->item->name}} from cart ?')
                                                }
                                                document.getElementById(`edit_form${x}`).submit();
                                            }</script>
                                    </div>
                                    <div class="col-lg-2">
                                        @if($card->item->discount==0)
                                            <div class="col">
                                            <h5 id="price" class="text-center font-weight-bold "
                                                >{{$card->item->price*$card->quantity}} JOD</h5>
                                            </div>
                                        @else
                                            <div class="col">
                                                <h5 id="price" class="text-center font-weight-bold">
                                                    {{($card->item->price-$card->item->price*$card->item->discount/100)*$card->quantity}}
                                                    JD</h5>
                                                <h6 class="text-center"
                                                    style="text-decoration:line-through">{{$card->item->price*$card->quantity}}
                                                    JD</h6>
                                            </div>
                                        @endif

                                            <form class="mt-2 p-0" method='post'

                                              action='{{route('card.destroy',['id' => $card->id])}}'>

                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete {{$card->item->name}} from cart ?')"
                                                    class=" col p-0 btn btn-link"><i
                                                    class="far fa-trash-alt"></i>
                                                Remove
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row ">
                        <div class="col">
                            {{$cards->links()}}
                        </div>
                    </div>

                </div>
                <div class="col-xl-3">

                    <!-- Search Widget -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <a href="{{route('order.create')}}" class="btn btn-primary btn-lg btn-block">Go to
                                checkout</a>
                            <div class="mt-3">
                                <div class="row">
                                    <h5 class="col align-self-start">Items({{$total['qnt']}})</h5>
                                    <h5 class="col  text-center align-self-end">{{$total['price']}} JD</h5>
                                </div>
                                <div class="row">
                                    <h5 class="col align-self-start">Discounts</h5>
                                    <h5 class="col text-center align-self-end">-{{$total['discount']}} JD</h5>
                                </div>

                                <p class="m-0">The price include tax *</p>
                                <p class="text-success">The price include delivery and installation</p>

                                <hr>
                                <div class="row">
                                    <h3 class="col align-self-start">Total </h3>
                                    <h3 class="col text-center align-self-end">{{$total['after_dis']}} JD</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endif
        </div>
    </div>


@endsection
