@extends('layouts.app')
@section('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<form class="col-md-4 col-md-offset-4" method="POST" action="{{ route('divisions_district_store') }}">
{{ csrf_field() }}

<div class="form-group">
    <select class="form-control" name="name" required="">
        @foreach($divisions as $division)
      <option value='{{ $division->id }}'>{{ $division->name }}</option>
       @endforeach
    </select>

</div>
<div class="form-group">

    <select class="form-control js-example-basic-multiple" name="district[]" multiple="multiple">
    	@foreach($districts as $district)
	  <option value='{{ $district->id }}'>{{ $district->name }}</option>
	   @endforeach
	</select>

</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary">Publish</button>
</div>


@if (count($errors))
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
</form>
@endsection

@section('scripts')
<script>
	$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endsection
