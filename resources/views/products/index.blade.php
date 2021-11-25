@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-9">
                
            <div class="card">
                <div class="card-header"><h4 style="float:left">ADD product</h4><a href="" style="float:right" class="btn btn-dark" data-toggle="modal" data-target="#addProduct"><i class="fa fa-plus"></i>Add products</a></div>
                <div class="card-body">
                    <table class="table table-borderd table-left">
                        <thead>
                            <tr>
                                <th>sn</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>alert_stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            <tbody>
                            @foreach($products as $key=>$product)
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>{{ $product->p_name}}</td>
                                    <td>{{ $product->description}}</td>
                                    <td>{{ $product->brand}}</td>
                                    <td>{{ number_format($product->price,2)}}</td>
                                    <td>{{ $product->quantity}}</td>
                                    
                                    <td>@if($product->alert_stock >=100)<span class="badge badge-danger">Low stock > {{$product->alert_stock}}</span>
                                    @else <span class="badge badge-success">{{$product->alert_stock}}</span>
                                    @endif
                                    </td>

                                    
                                    <td>
                                        <div class="btn-group">
                                         <a href=""class="btn btn-sm btn-info" data-toggle="modal"data-target="#editProduct{{ $product->id}}"><i class="fa fa-edit"></i>Edit</a>
                                         <a href=""class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteProduct{{ $product->id}}"><i class="fa fa-trash"></i>Delete</a>
                                        </div>
                                    </td>
                                </tr>
<!-- {{--modal for edit product--}} -->
                                    <div class="modal right fade" id="editProduct{{ $product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">Edit product</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                                <form action="{{ route('products.update',$product->id) }}" method="POST">
                                                @csrf
                                               {{method_field('PUT')}} 
                                                <div class="form-group">
                                                    <label for="">Product Name</label>
                                                    <input type="text"name="p_name"id="p_name"value ="{{ $product->p_name }}" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Description</label>
                                                    <input type="text"name="description"id=""value ="{{ $product->description }}"class="form-control">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="">Brand</label>
                                                    <input type="text"name="brand"id=""value ="{{ $product->brand }}"class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">price</label>
                                                    <input type="number "name="price"id=""value ="{{ $product->price }}"class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Quantity</label>
                                                    <input type="number "name="quantity"id=""value ="{{ $product->quantity }}"class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">alert stock</label>
                                                    <input type="number "name="alert_stock"id=""value ="{{ $product->alert_stock }}"class="form-control">
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-warning btn-block">Update product</button>
                                                </div>
                                                </form>
                                        </div>
                                        
                                        </div>
                                    </div>
</div>


</div>
                        <!-- {{--modal for update product--}} -->
                                    <div class="modal right fade" id="deleteProduct{{ $product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">Delete product</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                                @csrf
                                                {{method_field('Delete')}}
                                                <p>Are you sure want to delete product {{ $product->p_name }}</p>
                                                <div class="modal-footer">
                                                    <button class="btn btn-default "data-dismis="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger">Delete </button>
                                                </div>
                                                </form>
                                        </div>
                                        
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                {{ $products->links()}}
                            </tbody>

                    </table>
                </div>
            </div>
            </div>
                <div class="col-md-3">
                    
            <div class="card">
                <div class="card-header"><a href=""><h4>Search</h4></a></div>
                <div class="card-body">
                    .....
                </div>
            </div>
                </div>
        </div>
    </div>
</div>

<div class="modal right fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Add product</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="{{ route('products.store') }}" method="post">
            @csrf
             <div class="form-group">
                <label for="">Product Name</label>
                <input type="text"name="p_name "id=""class="form-control">
             </div>

              <div class="form-group">
                <label for="">description</label>
                <input type="text"name="description"id=""class="form-control">
             </div>
             <div class="form-group">
                <label for="">Brand</label>
                <input type="text"name="brand"id=""class="form-control">
             </div>   
             <div class="form-group">
                <label for="">Price</label>
                <input type="number"name="price"id=""class="form-control">
             </div>
             <div class="form-group">
                <label for="">Quantity</label>
                <input type="number"name="quantity"id=""class="form-control">
             </div>
             <div class="form-group">
                <label for="">Alert stock</label>
                <input type="number"name="alert_stock"id=""class="form-control">
             </div>
            
             <div class="modal-footer">
                <button class="btn btn-primary btn-block">Save product</button>
             </div>
            </form>
      </div>
    
    </div>
  </div>
</div>



<style>
    .modal.right .modal.diaglog {
        top: 0;
        right: 0;
        margin-right: 19vh;

    }
.modal.fade:not(.in).right .modal-dialog{
    -webkit-transform: translate3d(25%,0,0);
    transform: translate3d(25%,0,0);
}
</style>

@endsection