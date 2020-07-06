@extends('layouts.AdminmasterLayout')

@section('title')
    Edit Product
@endsection

@section('content')
    <div class="row">
        <h4>Add Product</h4>
        <form class="form-horizontal" action="{{ url('/admin/product/update/'.$product->id)}}" enctype="multipart/form-data" method="post">
        @csrf
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="title">Title:</label>
		    <div class="col-sm-10">
		      <input type="title" name="title" value="{{$product->title}}" class="form-control" id="title" placeholder="Enter title">
		      	@if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="price">Price:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="price" value="{{$product->price}}" id="price" placeholder="Enter Price">
		      	@if ($errors->has('price'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                @endif
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="price">Description:</label>	
		    <div class="col-sm-10">	    
			<textarea class="form-control" id="price" name="description" rows="3">{{$product->description}}</textarea>	</div>
			@if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif	  
		  </div>
		  <div class="form-group">
		  	<label class="control-label col-sm-2" for="customFile">Existing Image:</label>	
		    <div class="col-sm-10">
		    <img src="{{$product->imagePath}}" width="100" height="100">
		    </div>			   	  
		  </div>
		  <div class="form-group">
		  	<label class="control-label col-sm-2" for="customFile">Upload Image:</label>	
		    <div class="col-sm-10">
		    <input type="file" class="form-control" name="product_image" id="customFile">
		    </div>			   	  
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Submit</button>
		    </div>
		  </div>
		</form>
    </div>
@endsection