@extends('layouts.app')

<div style="background-image: url('img/lo.jpg');">
<div style="margin-top:20vh"></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div class="card" style="margin-top: 30px;">
                <div class="card-header">
                <h3 align="center">{{ __('Registro') }}</h3>
                </div>

                <br>
                <div align="center">
                    <div style="height:250px; width:250px; position: relative;">
                        <div id="visorArchivo" style="height:250px"  >
                             <!-- Aqui se despliega el preview -->
                            <img src="{{asset('img/users/unnamed.jpg')}}" alt="" style="height: auto; max-width: 100%; max-height: 100%; border-radius: 50%; border: 2px solid black;">
                        </div>
                    </div> 
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input {{ $errors->has('user_img') ? ' is-invalid' : '' }}" id="user_img" name="user_img" onchange="return validarExt()">
                                    <label class="custom-file-label" for="customFile">Imagen</label>
                                    @if ($errors->has('user_img'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('user_img') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fechaNac" placeholder="DD-MM-YYYY" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="fechaNac" type="date" class="form-control @error('fechaNac') is-invalid @enderror" name="fechaNac" value="{{ old('fechaNac') }}" required autocomplete="fechaNac" autofocus>

                                @error('fechaNac')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right" for="documento_tipo">{{ __('Tipo de Documento') }}</label>
                            <div class="col-sm-2">
                                <select class="form-control" id="documento_tipo" name="documento_tipo"> 
                                    <option value="DNI" >DNI</option>
                                    <option value="RUC" >RUC</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="documento_nro" class="col-md-4 col-form-label text-md-right">{{ __('N° de Documento') }}</label>

                            <div class="col-md-6">
                                <input id="documento_nro" type="number" class="form-control @error('documento_nro') is-invalid @enderror" name="documento_nro" value="{{ old('documento_nro') }}" required autocomplete="documento_nro" autofocus>

                                @error('documento_nro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript" src="/js/USUARIO.js"></script>