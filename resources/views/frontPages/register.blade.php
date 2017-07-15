@extends('layouts.frontend')
    @section('content')
      	<div class="wraper container-fluid">
        @include('includes.alert')
        
        <div class="col-sm-9 col-md-9 col-lg-9 col-md-offset-1 col-sm-offset-1 col-lg-offset-1">
            <div class="row">
                <!-- <div class="panel panel-default"> -->

                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                    <h4>Contribute making Bangla Corpus</h4>
                            </div>
                          
                         </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                            
                                <div class=" form"> 

                                    {!! Form::open(array('route' => 'contribute.store.info' , 'method' => 'post', 'class' => ' form-horizontal')) !!}

                                    <div class="form-group">
                                        <div class="col-lg-1 col-lg-offset-1">
                                            {!! Form::checkbox('anonymous', 1, false, array('class' => 'form-control checkbox-data control-label', 'id' => 'anonymous')) !!}
                                        </div>
                                        {!! Form::label('anonymous', "Check to submit text anonymously", array('class' => 'col-lg-6 ')) !!}
                                        
                                    </div>
                                    

                                    <div class="form-group">
                                        {!! Form::label('name', "Full Name", array('class' => 'control-label col-lg-2')) !!}
                                        <div class="col-lg-6">
                                            {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('email', "Email", array('class' => 'control-label col-lg-2')) !!}
                                        <div class="col-lg-6">
                                            {!! Form::email('email', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('bio', "Your Info", array('class' => 'control-label col-lg-2')) !!}
                                        <div class="col-lg-6">
                                            {!! Form::text('bio', null, array('class' => 'form-control', 'placeholder' => 'eg. Data Engineering, SUST, Sylhet.')) !!}
                                        </div>
                                    </div>

                                   <!--  <div class="form-group">
                                        {!! Form::label('corpusdata', "Contributor's Email", array('class' => 'control-label col-lg-2')) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('corpusdata', null, array('class' => 'form-control', 'placeholder' => 'Email', 'required' => 'required', 'aria-required' =>'true', 'rows' => 1)) !!}
                                        </div>
                                    </div> -->

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                        {!! Form::submit('Submit', array('class' => 'btn btn-success')) !!}
                                        </div>
                                    </div>

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                             
                    </div>
                <!-- </div> -->

            </div>

        </div>
        </div>
@stop

@section('script')

<script type="text/javascript">
    $(document).ready(function() {
    //set initial state.
    $('#textbox1').val(this.checked);

    $('#anonymous').change(function() {
        if(this.checked) {
            $('input[name=name]').prop('disabled', this.checked);
            $('input[name=name]').prop('required',true);

            $('input[name=email]').prop('disabled', this.checked); 
            $('input[name=email]').prop('required',true); 
            $('input[name=bio]').prop('disabled', this.checked);       
        } else {
            $('input[name=name]').prop('disabled', this.checked); // this.checked = false here
            $('input[name=email]').prop('disabled', this.checked);  
            $('input[name=bio]').prop('disabled', this.checked); 
        }     
    });
});    
</script>
@endsection