@extends('layout.dash')

@section('title', $title)

@section('content')
	<h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
    <p class="mb-4">In this page {{ app('NAME') }} admins can add new Mango item in database</p>

    @if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

 	<form class="text-center border border-light" action="/admin/mango/add" method="POST" enctype="multipart/form-data">
 		@csrf

 		<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

 		<input type="text" class="form-control mb-4" placeholder="Name. ex. Amrapali" name="name" value="{{ old('name') }}" required>

 		<input type="text" class="form-control mb-4" placeholder="Price (in BDT). ex. 120.0" name="price" value="{{ old('price') }}">

 		<input type="text" class="form-control mb-4" placeholder="Minimum Order. ex. 200 KG" name="min_order" value="{{ old('min_order') }}">

 		<textarea class="form-control mb-4" placeholder="Description" name="description">{{ old('description') }}</textarea>

 		<input type="text" class="form-control mb-4" placeholder="Origin. ex. Bangladesh" name="origin" value="{{ old('origin') }}">

 		<input type="text" class="form-control mb-4" placeholder="Color. ex. Green" name="color" value="{{ old('color') }}">

 		<input type="text" class="form-control mb-4" placeholder="Average weight. ex. 1" name="avg_weight" value="{{ old('avg_weight') }}">

 		<input type="text" class="form-control mb-4" placeholder="Cultivation. type ex. Common" name="cultivation_type" value="{{ old('cultivation_type') }}">

 		<input type="text" class="form-control mb-4" placeholder="Variety. ex. AMRAPALI" name="variety" value="{{ old('variety') }}">

 		<input type="text" class="form-control mb-4" placeholder="Grade. ex. High" name="grade" value="{{ old('grade') }}">

 		<input type="text" class="form-control mb-4" placeholder="Size. ex. 9-12 cm" name="size" value="{{ old('size') }}">

		<input type="text" class="form-control mb-4" placeholder="Style. ex. Fresh" name="style" value="{{ old('style') }}">

		<input type="text" class="form-control mb-4" placeholder="Type. ex. Mango" name="type" value="{{ old('type') }}">

		<input type="text" class="form-control mb-4" placeholder="Ripening. ex. 7 days post harvest" name="ripening" value="{{ old('ripening') }}">

		<div class="input-group mb-4">
			<div class="input-group-prepend">
				<span class="input-group-text" id="imageUpload">Upload Image</span>
			</div>
			<div class="custom-file">
				<input type="file" class="custom-file-input" name="image" id="imageUpload01"
				  aria-describedby="imageUpload" accept="image/png, image/jpeg, image/gif" required>
				<label class="custom-file-label" for="imageUpload01">Choose file</label>
			</div>
		</div>


        <div class="custom-control custom-checkbox mb-2">
            <input type="checkbox" class="custom-control-input" id="available" name="available">
            <label class="custom-control-label" for="available">Available</label>
        </div>

        {{-- show uploaded image here --}}
        <img class="mb-4" id="imageShow" src="#" height="200" style="display: none;">


	    <!-- Sign in button -->
	    <button class="btn btn-info btn-block col-2" type="submit">Add</button>

	</form>											
@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function() {
			//function for showing uploaded image instantly
			$('#imageUpload01').change(function(){
				readURL(this);
			})
		});

		function readURL(input) {
		 	if (input.files && input.files[0]) {
		    	var reader = new FileReader();
		    
		    	reader.onload = function(e) {
		      		$('#imageShow').attr('src', e.target.result);
		      		$('#imageShow').show();
		    	}
		    
		    reader.readAsDataURL(input.files[0]); // convert to base64 string
		  }
		}
	</script>
@endsection