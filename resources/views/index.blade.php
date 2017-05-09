<!DOCTYPE html>
<html lang="en">

@include('includes.header')

<style type="text/css">
/*-- ##Developer ====>>>> Masiur Rahman Siddiki || mrsiddiki@gmail.com */
    .footer {
        color: ##797979;
        position: absolute;
        left: 0;
        right: 0px;
    }

</style>


<body class="panel">




    <div class="wraper container-fluid">
        <h2>NLP Lab</h2>
        @include('includes.alert')
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <!-- <div class="panel panel-default"> -->

                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                    <h4>Contribute making Bangla Corpus</h4>
                            </div>
                            <!-- <div class="col-md-6">                            
                                <a class="pull-right" href="{!! route('category.index')!!}"><button class="btn btn-success">Category List</button></a>
                            </div> -->
                         </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <h5>What is Corpus?</h5>
                                <p><i>A collection of written texts, especially the entire works of a particular author or a body of writing on a particular subject.</i></p>
                                <h5>What is the use of Corpus?</h5>
                                <p><i>A corpus provides grammarians, lexicographers, and other interested parties with better discriptions of a language. Computer-procesable corpora allow linguists to adopt the principle of total accountability, retrieving all the occurrences of a particular word or structure for inspection or randomly selcted samples. Corpus analysis provide lexical information, morphosyntactic information, semantic information and pragmatic information.
                                <br>Linguistic information is provided by concordance and frequency counts.</i></p>

                            </div>
                            <div class="col-md-9">
                            
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

                                    <div class="form-group">
                                        {!! Form::label('corpusdata', "Email", array('class' => 'control-label col-lg-2')) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('corpusdata', null, array('class' => 'form-control', 'placeholder' => 'Email', 'required' => 'required', 'aria-required' =>'true', 'rows' => 1)) !!}
                                        </div>
                                    </div>

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

      

<br><br><br>
<!-- Footer Start -->
<!-- ##Developer ====>>>> Masiur Rahman Siddiki || mrsiddiki@gmail.com -->
<footer class="footer">
    <center>
    Copyright&copy; 2016 NLP Lab, Dept. of CSE, SUST. All rights reserved.</center>
</footer>
<!-- Footer Ends -->





</div>
<!-- js placed at the end of the document so the pages load faster -->
    {!! Html::script('js/jquery.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}
    {!! Html::script('js/pace.min.js')!!}
    {!! Html::script('js/wow.min.js') !!}
    {!! Html::script('js/jquery.nicescroll.js') !!}
    {!! Html::script('js/jquery.app.js') !!}


</body>
</html>