<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/icon.png') }}">
    <link href="{{asset('assets/form/form.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
</head>
<body>
    <!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Product</strong></h2>
                <p>Silahkan lakukan pembelian produk</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="product"><strong>Product</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
                            </ul>
                            <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">

                                    <section style="background-color: #eee;">
                                    @forelse ($data as $item)
                                        <div class="container py-2">
                                          <div class="row justify-content-center mb-3">
                                            <div class="col-md-12 col-xl-10">
                                              <div class="card shadow-0 border rounded-3">
                                                <div class="card-body">
                                                  <div class="row">
                                                    <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                                      <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                                        <img src="{{ $item->images }}"
                                                          class="w-100" />
                                                        <a href="#!">
                                                          <div class="hover-overlay">
                                                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                                          </div>
                                                        </a>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                                      <h5 class="text-black">{{ $item->product_name }}</h5>
                                                      <div class="d-flex flex-row">
                                                        @if ($item->discount != 0)
                                                            @php
                                                                $diskon = ($item->price * $item->discount) / 100;
                                                            @endphp
                                                            <span class="text-danger"><s>Rp.{{ $item->price}}</s></span>
                                                        </div>
                                                        <div class="mt-1 mb-0 text-muted small">
                                                            <h5 class="mb-1 me-1">Rp.{{ $item->price - $diskon}}</h5>
                                                        </div>
                                                        <div>
                                                        @else
                                                        </div>
                                                        <div class="mt-1 mb-0 text-muted small">
                                                            <h5 class="mb-1 me-1">Rp.{{ $item->price}}</h5>
                                                        </div>
                                                        <div>
                                                        @endif
                                                            <p>Subtotal : Rp. 10000</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                                      <div class="d-flex flex-column mt-4">
                                                        <p>Satuan: PCS</p>
                                                        <input id="qty" min="0" name="quantity" value="1" type="number"class="form-control form-control-sm" onkeyup='check()' />
                                                        <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="show({{$item->id                        }})">Details</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>                             
                                        </div>
                                        @empty
                                        <h3>Barang tidak ada</h3>
                                        @endforelse
                                    </section>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Next Step"/>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center">Success !</h2>
                                    <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image">
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5>You Have Successfully Signed Up</h5>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Product Detail</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row col-lg-12">
                <div class="col-lg-6">
                  <div id="image"></div>
                </div>
                <div class="col-lg-6">
                  <h4></u><div class="d-inline" id="product_name"></h4>
                  <h6>Rp. <div class="d-inline" id="price"></h6>
                  <h6>Dimension: <div class="d-inline" id="dimension"></h6>
                  <h6>Price Unit: <div class="d-inline" id="unit"></h6>
                  <div id="ratingContainer" class="star-rating"></div>
                </div>
            </div>
  
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
<script>
     var check = function() {
            var isi = document.getElementById('qty').value
            document.getElementById('qty1').value = isi;
        }

        function show(value) {
            $.ajax({
                url: 'allProducts/'+value,
                method: 'get',
                dataType: 'json',
                success: function(data){
                    $('#product_name').html(data.data.product_name);
                    $('#price').html(data.data.price);
                    $('#dimension').html(data.data.dimension);
                    $('#unit').html(data.data.unit);
                    $('#image').html('<img src="' +data.data.images+ '" alt="Image" width="100">');

                    displayRatingStars(data.data.rating);
                }
                });
            }
</script>
<script src="{{asset('assets/form/form.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>