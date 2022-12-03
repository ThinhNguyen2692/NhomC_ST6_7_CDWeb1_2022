<x-layout-home>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
<div class="container">                
<div class="contentbar">                
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Cart</h5>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 col-xl-8">
                                <div class="cart-container">
                                    <div class="cart-head">
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Action</th>                                               
                                                        <th scope="col">Photo</th>
                                                        <th scope="col">Product</th>
                                                        <th scope="col">Qty</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col" class="text-right">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $total = 0;?>
                                                    <form action="/UpdateCart" method="post">
                                                    @csrf
                                                @foreach (Cart::content() as $item)
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td><a href="/deletecart?id={{$item->rowId}}" class="text-danger"><i class="ri-delete-bin-3-line"></i></a></td>
                                                        <td><img src="{{ asset('/images/'.$item->options->image. '') }}" class="img-fluid" width="35" alt="product"></td>
                                                        <td>{{$item->name}}</td>
                                                        <td>
                                                            <div class="form-group mb-0">
                                                                <input type="number" class="form-control cart-qty" name="{{$item->rowId}}" id="cartQty1" value="{{ $item->qty  }}">
                                                            </div>
                                                        </td>
                                                        <td>${{$item->price}}</td>
                                                        <td class="text-right">${{ $item->price*$item->qty }}</td>
                                                    </tr>
                                                    <?php $total = $total + ($item->price*$item->qty) ?>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="cart-body">
                                        <div class="row">
                                            <div class="col-md-12 order-2 order-lg-1 col-lg-5 col-xl-6">
                                            <div class="cart-footer text-right">
                                         <button type="submit" class="btn btn-info my-1"><i class="ri-save-line mr-2"></i>Update Cart</button>
                                         </form>
                                         </div>
                                            </div>
                                            <div class="col-md-12 order-1 order-lg-2 col-lg-7 col-xl-6">
                                                <div class="order-total table-responsive ">
                                                    <table class="table table-borderless text-right">
                                                        <tbody>
                                                         
                                                        
                                                            <tr>
                                                                <td class="f-w-7 font-18"><h4>Amount :</h4></td>
                                                                <td class="f-w-7 font-18"><h4>${{$total}}</h4></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <form action="/AddBill" method="post">
                                            @csrf
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Tên:</label>
                                                    <input type="text" class="form-control" id="recipient-name" name="name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Số điện thoại:</label>
                                                    <input type="number" class="form-control" id="recipient-name" name="phone">
                                                </div>
                                           
                                                <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Email:</label>
                                                <input type="email" class="form-control" id="recipient-name" name="email">
                                                </div>
                                                <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Địa chỉ:</label>
                                                <input type="text" class="form-control" id="recipient-name" name="address">
                                                </div>
                                                <button href="page-checkout.html" type="submit" class="btn btn-success my-1">Thanh toán<i class="ri-arrow-right-line ml-2"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    </div>
</x-layout-home>