<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirm Page</title>
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
                <h2><strong>Checkout</strong></h2>
                <p>Silahkan lakukan konfirmasi product</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform" method="get" action="/create">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="product"><strong>Checkout</strong></li>
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
                                                        <img src="{{ $item['images'] }}"
                                                          class="w-100" />
                                                        <a href="#!">
                                                          <div class="hover-overlay">
                                                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                                          </div>
                                                        </a>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                                      <h5 class="text-black">{{ $item['product_name'] }}</h5>
                                                      <div class="d-flex flex-row">                                        
                                                        </div>
                                                        <div class="mt-1 mb-0 text-muted small">
                                                            <h6 class="mb-1 me-1">{{ $item['quantity']}} {{ $item['unit'] }}</h6>
                                                            <p>Subtotal: Rp.{{ number_format($item['subtotal'])  }}</p>
                                                        </div>
                                                        <div>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>                             
                                        </div>
                                        {{-- input hidden --}}
                                            <input type="hidden" name="id[]" value="{{ $item['id'] }}">
                                            <input type="hidden" name="product_code[]" value="{{ $item['product_code'] }}">
                                            <input type="hidden" name="dimension[]" value="{{ $item['dimension'] }}">
                                            <input type="hidden" name="currency[]" value="{{ $item['currency'] }}">
                                            <input type="hidden" name="product_name[]" value="{{ $item['product_name'] }}">
                                            <input type="hidden" name="unit[]" value="{{ $item['unit'] }}">
                                            <input type="hidden" name="price_diskon[]" value="{{ $item['price_diskon'] }}">
                                            <input type="hidden" name="price_normal[]" value="{{ $item['price_normal'] }}">
                                            <input type="hidden" name="discount[]" value="{{ $item['discount'] }}">
                                            <input type="hidden" name="subtotal[]" value="{{ $item['subtotal'] }}">
                                            <input type="hidden" name="quantity[]" value="{{ $item['quantity'] }}">
                                        {{-- end input hidden --}}
                                        @empty
                                        <h3>Barang tidak ada</h3>
                                        @endforelse
                                    </section>
                                    <div class="text-center mt-2" style="color: rgb(38, 34, 34);">
                                        <h4>TOTAL: Rp. {{ number_format($total) }}</h4>
                                    </div>
                                </div>
                                <a href="/home" class="btn btn-secondary" >Back</a>
                                <button type="submit" class="btn btn-primary">Checkout</button>
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