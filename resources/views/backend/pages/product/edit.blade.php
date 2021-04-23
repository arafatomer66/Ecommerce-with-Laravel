@extends ('backend.template.layout')

@section('dashboard-content')
<div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Edit Product</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
      </div>

      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="br-section-label">Card Block</h6>
          <p class="br-section-text">An example some text within a card block.</p>



          <div class="row mg-b-20">
            <div class="col-md">
              <div class="card card-body">
                <!-- Create New Category Form Start -->
                <form action="{{ route('updateProduct', $product->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label>Product Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $product->title }}">
                  </div>

                  <div class="form-group">
                    <label>Product Description</label>
                    <textarea class="form-control" name="description" rows="4">{{ $product->description }}</textarea>
                  </div>

                  <div class="form-group">
                    <label>Regular Price</label>
                    <input type="text" name="r_price" class="form-control" value="{{ $product->regular_price }}">
                  </div>

                  <div class="form-group">
                    <label>Offer Price</label>
                    <input type="text" name="o_price" class="form-control" value="{{ $product->offer_price }}">
                  </div>

                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" name="quantity" class="form-control" value="{{ $product->quantity }}">
                  </div>

                  <div class="form-group">
                    <label>Product Status</label>
                    <select name="status" class="form-control">
                      <option>Please Select Product Status</option>
                      <option value="1" @if($product->status == 1) selected @endif >Active</option>
                      <option value="0" @if($product->status == 0) selected @endif>In-active</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Is Featured?</label>
                    <select name="featured" class="form-control">
                      <option>Please Select Product Featured (Yes / No)</option>
                      <option value="1" @if($product->is_featured == 1) selected @endif>Yes</option>
                      <option value="0" @if($product->is_featured == 0) selected @endif>No</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Select Brand</label>
                    <select name="brand_id" class="form-control">
                      <option>Please Select Product Brand</option>
                      @foreach ( App\Models\Backend\Brand::orderBy('name', 'asc')->get() as $brand )
                        <option value="{{ $brand->id }}" @if($product->brand_id == $brand->id) selected @endif>{{ $brand->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Select Category</label>
                    <select name="category_id" class="form-control">
                      <option>Please Select Product Category</option>
                      @foreach ( App\Models\Backend\Category::orderBy('name', 'asc')->where('parent_id', 0)->get() as $parent )
                        <option value="{{ $parent->id }}" @if($product->category_id == $parent->id) selected @endif>{{ $parent->name }}</option>
                        @foreach ( App\Models\Backend\Category::orderBy('name', 'asc')->where('parent_id', $parent->id )->get() as $child )
                          <option value="{{ $child->id }}" @if($product->category_id == $child->id) selected @endif> - {{ $child->name }}</option>
                        @endforeach
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Product Main Thumbnail</label><br>
                    <input type="file" name="p_image[]" class="form-control-file">
                  </div>

                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Thumbnail 1</label><br>
                        <input type="file" name="p_image[]" class="form-control-file">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Thumbnail 2</label><br>
                        <input type="file" name="p_image[]" class="form-control-file">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Thumbnail 3</label><br>
                        <input type="file" name="p_image[]" class="form-control-file">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Thumbnail 4</label><br>
                        <input type="file" name="p_image[]" class="form-control-file">
                      </div>
                    </div>
                  </div>



                  <div class="form-group">
                    <input type="submit" name="addProduct" value="Publish Product" class="btn btn-primary">
                  </div>

                </form>
                <!-- Create New Category Form End -->
              </div><!-- card -->
            </div><!-- col -->
          </div><!-- row -->


        </div><!-- br-section-wrapper -->
      </div>


@endsection
