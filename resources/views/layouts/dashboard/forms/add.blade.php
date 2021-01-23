<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <form action="{{ url('home/products') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">                         
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" required placeholder="Title">
                        </div>
                    </div>                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="sub_title" class="form-control" required placeholder="Sub-Title">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="price" class="form-control" required placeholder="Price">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="stock_in" class="form-control" required placeholder="Stock">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="details" class="form-control" required placeholder="Details">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="more_info" class="form-control" required placeholder="More info...">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">                     
                            <input type="file" name="avatar" class="form-control" required placeholder="Choose image">                          
                        </div>                        
                    </div>
                </div>                                                                                                                     
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" {{-- data-dismiss="modal" --}}>Guardar</button>
            </div>
        </form>
        </div>
    </div>
</div>