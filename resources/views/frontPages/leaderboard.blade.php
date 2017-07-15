@extends('layouts.frontend')
    @section('content')
        @include('includes.alert')
        <div class="container">
        <br>
        
	        <div class="col-md-9 col-md-offset-1">
	        <h3>Leaderboards</h3>
	        <p style="color:olive">*Each contributions achieves <b>10</b> points.</p>
	        	<div class="row">
	        		<div class="col-md-12">
	        			<table class="table table-striped" id="dataTable">
						    <thead>
						      <tr>
						        <th>Contributor</th>
						        <th>Email</th>
						        <th>Total Points</th>
						      </tr>
						    </thead>
						    <tbody>
						    @if(count($users))
						    @foreach($users as $user)
						    	@unless($user->hasRole('admin'))
							      <tr>
							        <td>{{ $user->name }}</td>
							        <td>{{ $user->email }}</td>
							        <td>{{ $user->points }}</td>
							      </tr>
							      @endunless
						    @endforeach
						    @endif
						    </tbody>
						 </table>
	        		</div>
	        		
	        	</div>
	        </div>
        </div>


@stop

@section('style')

{!! Html::style('assets/datatables/jquery.dataTables.min.css') !!}

@endsection

@section('script')

    {!! Html::script('assets/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/datatables/dataTables.bootstrap.js') !!}




    <!-- for Datatable -->
    <script type="text/javascript">

        $(document).ready(function() {
            
            $('#dataTable').dataTable({
            	"ordering": false
            });
            

  
           

        });
    </script>


@stop
