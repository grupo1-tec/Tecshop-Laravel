@extends('layouts.app')
<div style="margin-top:20vh"></div>
<div class="container">
<div class="row mb-4 justify-content-mb-center">
    <div class="col-md-6 centro">
    <table class="table table-borderless">
        <thead>
            <tr>
            <th scope="col">Contenido</th>
            </tr>   
        </thead>
        <tbody>
        @foreach(Auth::user()->notifications as $notification)
                        @if($notification->data['tipo']=="servicio")
                            <a class="dropdown-item" href="{{ action('ServiciosController@show',$notification->data['post']) }}">
                                <div class="review_image">
                                    @if(App\User::find($notification->data["user"]) !="")
                                        <img src="{{asset(App\User::find($notification->data['user'])->user_img)}}" alt="">
                                    @else
                                        <img src="{{asset('img/users/unnamed.jpg')}}" alt="">
                                    @endif
                                </div>
                                <div class="review_content">
                                    <div class="review_text">
                                        {{ App\User::find($notification->data["user"])->name }} comentó la publicación de tu servicio.
                                    </div>
                                </div>
                            </a>
                        @else
                            <a class="dropdown-item" href="{{ action('ProductoController@read',$notification->data['post'] )}}">
                                <div class="review_image">
                                    @if(App\User::find($notification->data["user"]) !="")
                                        <img src="{{asset(App\User::find($notification->data['user'])->user_img)}}" alt="">
                                    @else
                                        <img src="{{asset('img/users/unnamed.jpg')}}" alt="">
                                    @endif
                                </div>
                                <div class="review_content">
                                    <div class="review_text">
                                {{ App\User::find($notification->data["user"])->name }} comentó la publicación de tu producto.
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
        </tbody>
        </table>
    </div>
</div>
</div>
