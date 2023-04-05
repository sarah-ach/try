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


    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
    </head>
    <body>

    

    <section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Identification</h2>

              <form method="GET" action="{{url('/qrcode')}}">
                @csrf
                <div class="form-outline mb-4">
                  <input type="text" id="id_operateur" name="id_operateur" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example1cg">Id Operateur</label>
                </div>

                @foreach($users as $user)
                <div class="form-outline mb-4">
                  <textarea type="search" id="splice_name" name="splice_name" class="form-control form-control-lg" > {{$user->splice_name}}
                  </textarea>
                  <label class="form-label" for="form3Example3cg">Splice name</label>
                </div>

               

                <!--  -->

                

                <div class="form-outline mb-4">
                  <textarea type="text" id="location" name="location" class="form-control form-control-lg" >{{$user->location}}</textarea>
                  <label class="form-label" for="form3Example4cg">Location</label>
                </div>
              @endforeach
                <div class="form-outline mb-4">
                  <input type="text" id="quantite" name="quantite" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cdg">Quantite</label>
                </div>

                
                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
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
</section>




    </body>

</html>