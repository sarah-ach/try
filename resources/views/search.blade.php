<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @vite(['resources/js/app.js'])
</head>
<body>
  <div class="row">
  <div class="col-lg-6 grid-margin stretch-card mt-4">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title ">Opération</h4>
        
        <div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" style="background-image: url({{ url('assets/images/auth/register.jpg') }}); background-size: cover;">
  <div class="row w-100">
    <div class="col-lg-4 mx-auto">
      <div class="auto-form-wrapper" onload="document.pos.barcode.focus();">
        
          <div class="form-group mt-4">
            <div class="input-group-append">
            <form method="POST" action="{{url('/search')}}">
            {{ csrf_field() }}
            <div class="input-group">
              
              <div class="row justify-content-center">
       
             
<div class="media-body">

          </div>
          <div class="input-group mt-4">
              <input type="search" id="wireName" name="search" class="form-control mt-4 @error('search') is-invalid @enderror" placeholder="splace name" style="width: 16rem;" />
                @error('circuit')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group mt-4">

            <div class="input-group">
            
            <div class="mycard m-1 p-1 mt-4 "  >
                <textarea id="location" type="text" class=" form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style="width: 16rem;" placeholder="Location">
                </textarea>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            </div>
            

            <div class="input-group mt-4">

                <input style="width: 16rem;"  id="scan_loc" type="text" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Scan-location">
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
              
            
          <div class="form-group mt-4">
            <div class="input-group">
              <input style="width: 16rem;"  type="text" class="form-control @error('serie') is-invalid @enderror" placeholder="Numéro de série" name="serie" id="serie" required><br>
              @error('serie')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
           
          </div>
            </div>
          </div>

         
    </div>




          
    
          <div class="row mb-0 mt-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        @if($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
        </form>
        </div>
    </div>
  </div>
  </div>
  </div>
</div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 grid-margin stretch-card mt-4">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Donnée de circuit</h4>
       
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
            <tr>
            
                <th>Circuit</th>
                <th>Emplacement</th>
                <th>Quantité</th>
                <th>Date</th>
             
              </tr>
            </thead>
            <tbody>
           
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>


<script>
    $(document).ready(function () {
        $('#wireName').on('keyup', function(){
            var value = $(this).val();
            
             $.ajax({
                type: "get",
                url: "/search",
                data: {'search':value},
                success: function (data) {
                    $('.mycard').html(data);
                   //console.log(data);
                  
                }
            }); 
        });
    });
</script>

