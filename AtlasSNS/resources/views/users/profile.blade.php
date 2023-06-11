@extends('layouts.login')

@section('content')
    <div class="card w-50 mx-auto m-5">
        <div class="card-body">
            <div class="pt-2">
                <p class="h3 border-bottom border-secondary pb-3">プロフィール編集</p>
            </div>
            {!! Form::open(['route' => ['profile_edit'], 'method' => 'PUT']) !!}
            {!! Form::hidden('id',$user->id) !!}
            <div class="m-3">
                <div class="form-group pt-1">
                    {{Form::label('name','user name')}}
                    {{Form::text('name', $user->username, ['class' => 'form-control', 'id' =>'user name'])}}
                    <span class="text-danger">{{$errors->first('name')}}</span>
                    <input type="hidden" name="name" value="{{$user->name}}"/>
                </div>
                <div class="form-group pt-2">
                    {{Form::label('email','mail address')}}
                    {{Form::email('email', $user->mail, ['class' => 'form-control', 'id' =>'email'])}}
                    <span class="text-danger">{{$errors->first('email')}}</span>
                </div>
                <div class="form-group pt-2">
                    {{Form::label('password','password')}}
                    {{Form::password('password',['class' => 'form-control', 'id' =>'password'])}}
                    <span class="text-danger">{{$errors->first('password')}}</span>
                    <!-- <input type="password/"> -->
                </div>
                <div class="form-group pt-2">
                    <div class="row g-3">
                        <div class="col-md-2">
                        {{Form::label('password_confirmation','password comfirm')}}
                        {{Form::password('password_confirmation', ['class' => 'form-control', 'id' =>'password_confirmation'])}}
                        <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
                    <!-- <input type="password_comfirmation"> -->
                        </div>
                        <div class="col-md-10">
                        </div>
                            <div class="form-group pull-right">
                            </div>
                    </div>
                    <div class="form-group pt-2">
                        {{Form::label('bio','bio')}}
                        <input type="text" placeholder="Laravelの勉強をしています。">
                        <span class="text-danger">{{$errors->first('bio')}}</span>
                        <div class="from-group pt-3">
                            {{Form::label('icon image','icon image')}}
                            <input type="text" placeholder="">
                        </div>
                        <div class="row g-3">
                            <div class="col-md-2">
                                {{Form::submit(' 更新する ', ['class'=>'btn btn-success rounded-pill'])}}
                                <a href="/post/{{'/'}}/update"></a>

                            </div>
                    </div>
                </div>

            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
