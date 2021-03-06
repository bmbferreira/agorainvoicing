@extends('themes.default1.layouts.master')
@section('title')
Edit Plan
@stop
@section('content-header')
<h1>
Edit Plan
</h1>
  <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('plans')}}">All Plans</a></li>
        <li class="active">Edit Plan</li>
      </ol>
@stop
@section('content')
<div class="box box-primary">

    <div class="content-header">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
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
                    <i class="fa fa-check"></i>
                    <b>{{Lang::get('message.success')}}!</b>
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
         {!! Form::model($plan,['url'=>'plans/'.$plan->id,'method'=>'patch']) !!}
        <h4>{{Lang::get('message.plan')}}	<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-refresh">&nbsp;&nbsp;</i>{!!Lang::get('message.update')!!}</button></h4>

    </div>
    <div class="box-body">

        <div class="row">

            <div class="col-md-12">

            

                
                <div class="row">
                         <div class="col-md-4 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <!-- first name -->
                        {!! Form::label('name',Lang::get('message.name'),['class'=>'required']) !!}
                        {!! Form::text('name',null,['class' => 'form-control']) !!}

                    </div>
                     <div class="col-md-4 form-group {{ $errors->has('product') ? 'has-error' : '' }}">
                        <!-- first name -->
                        {!! Form::label('product',Lang::get('message.product'),['class'=>'required']) !!}
                         <select name="product" id="planproduct" class="form-control" onchange="myProduct()">
                          <option value="">Choose</option>
                             
                            @foreach($products as $key=>$product)
                            <option value="{{$key}}"  <?php  if(in_array($product, $selectedProduct) ) { echo "selected";} ?>>{{$product}}</option>
                           
                             @endforeach
                        </select>



                    </div>
                   <div class="col-md-4 form-group plandays {{ $errors->has('days') ? 'has-error' : '' }}">
                        <!-- last name -->
                        {!! Form::label('days','Periods',['class'=>'required']) !!}
                      <select name="days" id="plan" class="form-control" onchange="myFunction()">
                          <option value="">Choose</option>
                             
                            @foreach($periods as $key=>$period)
                                   <option value="{{$key}}" <?php  if(in_array($period, $selectedPeriods) ) { echo "selected";} ?>>{{$period}}</option>
                           
                             @endforeach
                        </select>

                    </div>

                    <div class="col-md-12">
                        <table class="table table-responsive">
                            <tr>
                                
                                <td>

                                    <table class="table table-responsive">
                                        <tr>
                                            <th><b>{!! Form::label('currency',Lang::get('message.currency')) !!}</b></th>
                                            <th>{{Lang::get('message.regular-price')}}</th>
                                            <th>{{Lang::get('message.renew-price')}}</th>

                                        </tr>

                                        @foreach($currency as $key=>$value)
                                        <tr class="form-group {{ $errors->has('add_price.'.$key) ? 'has-error' : '' }}">
                                            <td>

                                                <input type="hidden" name="currency[{{$key}}]" value="{{$key}}">
                                                {!! Form::label('days',$value,['class'=>'required']) !!}

                                            </td>

                                            <td>
                                                @if(key_exists($key,$add_price))
                                                {!! Form::text("add_price[$key]",$add_price[$key],['class' => 'form-control periodChange']) !!}
                                                 @else
                                                 {!! Form::text("add_price[$key]",null,['class' => 'form-control']) !!}
                                                 @endif

                                            </td>
                                            

                                            <td>
                                                @if(key_exists($key,$renew_price))
                                                {!! Form::text("renew_price[$key]",$renew_price[$key],['class' => 'form-control periodChange']) !!}
                                                 @else
                                                 {!! Form::text("renew_price[$key]",null,['class' => 'form-control periodChange']) !!}
                                                 @endif

                                            </td>

                                        </tr>
                                        @endforeach


                                    </table>

                                </td>
                            </tr>
                        </table>
                    </div>
                    
                  


                </div>





            </div>

        </div>

    </div>

</div>


{!! Form::close() !!}

<script>
   function myFunction(){
    var period = document.getElementById('plan').value;
   if (period == 365){

     period = '/One-Time' ; 
   }
    else if (period >= 30 && period < 365){
    period = '/Month' ;
   }
  else if (period > 365){
    period= '/Year';
  }
  else{
    period= '';
  }
    $('.periodChange').val(period);
  
  }
</script>
<script>
    $( document ).ready(function() {

         var product = document.getElementById('planproduct').value;
         // console.log(product)
         $.ajax({
            type: 'get',
            url : "{{url('get-period')}}",
            data: {'product_id':product},
           success: function (data){
            console.log(data.subscription);

            if(data.subscription != 1 ){
              $('.plandays').hide();
            }
            else{
               $('.plandays').show();
            }

            var sub = data['subscription'];
           
           }
         });
 // console.log(product)

 });



    function myProduct(){
         var product = document.getElementById('planproduct').value;
         // console.log(product)
         $.ajax({
            type: 'get',
            url : "{{url('get-period')}}",
            data: {'product_id':product},
           success: function (data){
            console.log(data.subscription);

            if(data.subscription != 1 ){
              $('.plandays').hide();
            }
            else{
               $('.plandays').show();
            }

            var sub = data['subscription'];
           
           }
         });
 // console.log(product)
}
</script>

@stop