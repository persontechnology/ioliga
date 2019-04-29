@if ($errors->any())
  <div class="alert alert-danger alert-dismissible alert-styled-left fade show" role="alert" >
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	  <strong>
		  @foreach ($errors->all() as $error)
	        <li>{{ $error }}</li>
	    @endforeach
	    </strong>
	</div> 
@endif



@foreach (['success', 'warning', 'info', 'danger'] as $msg)
    @if(Session::has($msg))
      	<div class="alert alert-{{ $msg }} alert-dismissible alert-styled-left fade show" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		  <strong>{{ Session::get($msg) }}</strong>
		</div> 
    @endif
@endforeach