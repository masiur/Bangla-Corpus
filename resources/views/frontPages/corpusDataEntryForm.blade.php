@extends('layouts.frontend')
    @section('content')
      	<div class="wraper container-fluid">
        <br>
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

                                    {!! Form::open(array('route' => 'corpus.store' , 'method' => 'post', 'class' => 'cmxform form-horizontal tasi-form')) !!}


                                    <div class="form-group">
                                        {!! Form::label('category_id', "Category*", array('class' => 'control-label col-lg-2')) !!}
                                        <div class="col-lg-10">
                                            {!! Form::select('category_id', $categories, null, array('class' => 'form-control',  'required' => 'required',  'autofocus')) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('corpusdata', "Text*", array('class' => 'control-label col-lg-2')) !!}
                                        <div class="col-lg-10">
                                            {!! Form::textarea('corpusdata', null, array('class' => 'form-control', 'placeholder' => 'Place here a paragraph of the selected category', 'required' => 'required', 'aria-required' =>'true', 'rows' => 12)) !!}
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
                                        {!! Form::submit('Contribute', array('class' => 'btn btn-success')) !!}
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