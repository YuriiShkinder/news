

<div class="row" style="
margin: 50px 0;
">

    <div class="col-lg-10 center"  >
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            @if(isset($slider))
            <ol class="carousel-indicators">

                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>

            </ol>
            <div class="carousel-inner" role="listbox">
                @foreach($slider as $k=>$value)

                            @if($k==0)
                        <div class="carousel-item  active">
                            <div class="news">
                                <h4 >{{$value['category']}}</h4>
                                <p>{{$value['title']}}</p>
                                <span>{{$value['text']}}</span>
                            </div>

                            <img class=" img" src="{{$value['images']}}" alt="{{$value['title']}}">
                        </div>
                            @else

                        <div class="carousel-item  ">
                            <div class="news">
                                <h4 >{{$value['category']}}</h4>
                                <p>{{$value['title']}} </p>
                                <span>{{$value['text']}}</span>
                            </div>
                            <img class="img" src="{{$value['images']}}" alt="{{$value['title']}}">
                        </div>
                            @endif
                        </ul>

                @endforeach
            </div>
            <a class="control_left" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span style="position: absolute; left: 20px" class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="control_right" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span style="position: absolute; left: -40px" class="carousel-control-next-icon" aria-hidden="true"></span>

                <span class="sr-only">Next</span>
            </a>
                @endif
        </div>
    </div>
</div>


<h3 style="text-align: center">Top-3 commentator</h3>
<div style="margin-top: 20px" class="row border justify-content-center ">
@if(isset($users))
    @foreach($users as $user)
            <div class="col-lg-2 text-center">
               <h1><a href="{{route('user',['user'=>$user->user_id])}}"> {{$user->user->name}}</a></h1>
                <img style="border-radius: 10px" src="https://randomuser.me/api/portraits/women/{{rand(0,100)}}.jpg">
               <h5 style="margin-top: 10px"> count coments:{{$user->count}}</h5>
            </div>
        @endforeach
    @endif

</div>


<h3 style="text-align: center; margin-top:50px ;">Top-3 themes</h3>
<div  class="row border ">
    @if(isset($thems))
        @foreach($thems as $them)

            <div class="col-lg-4 text-center">
                <h1> <a href="{{route('news',['id'=>$them->new_id,'category'=>$them->new->category->categorys])}}">{{$them->new->title}}</a></h1>
                <img style="border-radius: 10px ;height: 150px" src="{{$them->new->images}}">
                <h5 style="margin-top: 10px"> count coments:{{$them->count}}</h5>
            </div>
        @endforeach
    @endif

</div>

<div class='row'>
    <div class="col-lg-12">
        <h3 class="text-center">News category</h3>
    </div>
</div>

<div class="row">
    <div class="col-lg-3">

        @if(isset($blurds))

            @for($i=0;$i<(count($blurds));$i+=2)
                <div class="baner">
                    <h6 class="text-center overflow">{{$blurds[$i]['title']}}</h6>
                    <div class="price">
                        <img class="baner_img" src="https://randomuser.me/api/portraits/women/{{ rand(5,100) }}.jpg">
                    <p>{{$blurds[$i]['firm']}}</p>
                    <p class="float-right">{{$blurds[$i]['price']}}$</p>
                    </div>
                </div>
            @endfor
        @endif

    </div>
    <div class="col-lg-6">
        <div class='row'>
            <div class="col-lg-12">


                        @if(isset($news))
                        @foreach($news as $category=>$new)
                            <div class="category">

                                <h3 style="width: 90%; display: inline-block"><a href="{{route('category',[$category])}}">{{$category}}</a></h3>
                                <span  class="glyphicon glyphicon-plus plus"></span>

                                <div style="display: none" class="news_show">
                                @foreach($new as $val)

                                        @if($val['id']>0)
                                            <div class="cat_news">
                                                <a class="" href="{{route('news',['category'=>$category,'id'=>$val['id']])}}">{{$val['title']}}</a>
                                            </div>

                                        @else
                                          {{$val['title']}}
                                        @endif

                                @endforeach
                                </div>
                            </div>
                            @endforeach
                            @endif

            </div>


        </div>

    </div>
    <div class="col-lg-3">
        @if(isset($blurds))
            @for($i=1;$i<=count($blurds);$i+=2)
                <div class="baner">
                    <h6 class="text-center overflow">{{$blurds[$i]['title']}}</h6>
                    <div class="price">
                        <img class="baner_img" src="https://randomuser.me/api/portraits/women/{{ rand(5,100) }}.jpg">
                        <p>{{$blurds[$i]['firm']}}</p>
                        <p class="float-right">{{$blurds[$i]['price']}}$</p>
                    </div>
                </div>
            @endfor
        @endif
    </div>
</div>

<script>

    $('.plus').click(function () {


        if($(this).hasClass('glyphicon-plus')){
            $(this).removeClass('glyphicon-plus').addClass('glyphicon-minus');


        }else {
            $(this).removeClass('glyphicon-minus').addClass('glyphicon-plus');

        }

        $(this).siblings('.news_show').slideToggle();



    })


</script>