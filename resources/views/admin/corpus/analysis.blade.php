@extends('layouts.default')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            @include('includes.alert')

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>{{ $title }}</h4>
                                </div>
                                <!-- <div class="col-md-6">                            
                                     <a class="pull-right" href="{!! route('corpus.create')!!}"><button class="btn btn-success">Add corpus</button></a>
                                </div> -->
                            </div>
                        </div>
                                                   
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                            <h4>Main Text</h4>
                                            {{ $result['mainText'] }}
                                            <br>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-panel widget-style-2 white-bg">
                                                <!-- <i class="ion-android-contacts text-success"></i>  -->
                                                <h2 class="m-0 counter">{{ $result['totalWords'] }}</h2>
                                                <div>Total Words</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-panel widget-style-2 white-bg">
                                                <!-- <i class="fa fa-folder text-purple"></i>  -->
                                                <h2 class="m-0 counter">{{ $result['uniqueWordCount'] }}</h2>
                                                <div>Unique Words</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-panel widget-style-2 white-bg">
                                                <!-- <i class="ion-ios7-pricetag text-info"></i>  -->
                                                <h2 class="m-0 counter">{{ $result['firstElement'] }}</h2>
                                                <div>First Word</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="widget-panel widget-style-2 white-bg">
                                                <!-- <i class="ion-eye text-pink"></i>  -->
                                                <h2 class="m-0 counter">{{ $result['lastElement'] }}</h2>
                                                <div>Last Word</div>
                                            </div>
                                        </div>
                                    </div> <!-- end row -->
                                    <div class="row">
                                        <h4>Unique Words</h4>
                                        {{ $result['uniqueWords'] }}
                                    </div>
                                    <div class="row">
                                        <h4>Occurences</h4>
                                        @foreach($result['countEachWords'] as $words => $countVal)
                                            <div class="col-md-3"> {{ $words }} - {{ $countVal }} </div>
                                        @endforeach
                                        {{-- $result['countEachWords'] --}}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop







