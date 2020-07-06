@extends('layouts.AdminmasterLayout')

@section('title')
    Add Product
@endsection

@section('content')
    <div class="row">
        <h4>Add Product</h4>
        <form class="form-horizontal" action="{{ route('addproductsave')}}" enctype="multipart/form-data" method="post">
        @csrf
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="title">Title:</label>
		    <div class="col-sm-10">
		      <input type="title" name="title" class="form-control" id="title" placeholder="Enter title">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="price">Price:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" name="price" id="price" placeholder="Enter Price">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="price">Description:</label>	
		    <div class="col-sm-10">	    
			<textarea class="form-control" id="price" name="description" rows="3"></textarea>	</div>	  
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