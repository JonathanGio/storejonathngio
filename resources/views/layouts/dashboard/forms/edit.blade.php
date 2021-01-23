<div class="modal fade" id="ModalEditProduct{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="{{ route('products.update', $value->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update {{ $value->title }} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">   
                <div class="row">
                    <div class="col-md-12">                      
                        <img src="{{ url('/img/products/'.$value->avatar) }}" class="img img-avatar" rel="nofollow" alt="...">
                    </div>
                </div>                      
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">SKU</label>
                            <input type="text" name="title" value="{{ $value->sku }}" class="form-control" required readonly placeholder="SKU">
                        </div>
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Title</label>
                            <input type="text" name="title" value="{{ $value->title }}" class="form-control" required placeholder="Title">
                        </div>
                    </div>                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Sub-title</label>
                            <input type="text" name="sub_title" value="{{ $value->subtitle }}" class="form-control" required placeholder="Sub-Title">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Price</label>
                            <input type="text" name="price" value="{{ $value->price }}" class="form-control" required placeholder="Price">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Stock</label>
                            <input type="text" name="stock_in" value="{{ $value->stock_available }}" class="form-control" required placeholder="Stock">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Details</label>
                            <textarea type="text" name="details" class="form-control" required placeholder="Details">{{ $value->details }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">More info...</label>
                            <textarea type="text" name="more_info" class="form-control" required placeholder="More info...">{{ $value->more_info }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Available</label>
                            @if($value->available == 1)
                            <select class="form-control" name="active" title="choose one" data-size="7">
                                <option disabled> choose one</option>
                                <option value="1" selected="true">ACTIVE </option>
                                <option value="0">INACTIVE</option>
                            </select>
                            @else
                            <select class="form-control" name="active" title="choose one" data-size="7">
                                <option disabled> choose one</option>
                                <option value="1">ACTIVE </option>
                                <option value="0" selected="true">INACTIVE</option>
                            </select>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mt-5">
                        <div class="input-group">                                               
                            <input type="file" name="avatar" class="form-control" placeholder="Choose image">                          
                        </div>                        
                    </div>

                </div>                                                                                                                     
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" {{-- data-dismiss="modal" --}}>Save</button>
            </div>
        </form>
       </div>
    </div>
</div>