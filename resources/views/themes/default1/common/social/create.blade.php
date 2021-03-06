@extends('themes.default1.layouts.master')
@section('content-header')
<h1>
Create New Social Media
</h1>
  <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="{{url('socila-media')}}"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Social Media</li>
      </ol>
@stop
@section('content')

<div class="row">

    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('success')}}
                </div>
                @endif
                <!-- fail message -->
                @if(Session::has('fails'))
                <div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-ban"></i>
                    <b>{{Lang::get('message.alert')}}!</b> {{Lang::get('message.failed')}}.
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('fails')}}
                </div>
                @endif
            </div>



            <div class="box-body">
                {!! Form::open(['url'=>'social-media','method'=>'post']) !!}

                <table class="table table-condensed">

                    <tr>
                        <td><h3 class="box-title">{{Lang::get('message.social-media')}}</h3></td>
                        <td>  <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-floppy-o">&nbsp;&nbsp;</i>{!!Lang::get('message.save')!!}</button></td>

                    </tr>

                    <tr>

                        <td><b>{!! Form::label('name',Lang::get('message.name'),['class'=>'required']) !!}</b></td>
                        <td>
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">


                                {!! Form::text('name',null,['class' => 'form-control']) !!}
                                <p><i> {{Lang::get('message.enter-the-name-of-the-social-media')}}</i> </p>


                            </div>
                        </td>

                    </tr>
                    <tr>

                        <td><b>{!! Form::label('class',Lang::get('message.class'),['class'=>'required']) !!}</b></td>
                        <td>

                            <div class="form-group {{ $errors->has('class') ? 'has-error' : '' }}">


                                {!! Form::text('class',null,['class' => 'form-control']) !!}
                                <p><i> {{Lang::get('message.enter-the-css-class-of-the-social-media')}}</i> </p>



                        </td>


                    </tr>
                    <tr>
                        <td><b>{!! Form::label('fa_class',Lang::get('message.fa-class'),['class'=>'required']) !!}</b></td>
                        <td>

                            <div class="form-group {{ $errors->has('fa_class') ? 'has-error' : '' }}">


                                {!! Form::text('fa_class',null,['class' => 'form-control']) !!}
                                <p><i> {{Lang::get('message.enter-the-fa-class-of-the-social-media')}}</i> </p>



                        </td>
                    </tr>

                    <tr>

                        <td><b>{!! Form::label('link',Lang::get('message.link'),['class'=>'required']) !!}</b></td>
                        <td>
                            <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">


                                {!! Form::text('link',null,['class' => 'form-control']) !!}
                                <p><i> {{Lang::get('message.enter-the-link-of-the-social-media')}}</i> </p>


                            </div>
                        </td>

                    </tr>



                    {!! Form::close() !!}

                </table>



            </div>

        </div>
        <!-- /.box -->

    </div>


</div>

@stop