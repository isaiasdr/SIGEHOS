<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/footer.css')}}"/>
    <link rel="icon" href="{{asset('img/favicon.ico')}}" type="image/ico"/>
    <!-- font awesome -->

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}"/>

    <title>Login Sigehos</title>
  </head>
  <body>
    <div class="container">
      <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
          @if($errors->any())
            <div class="alert alert-danger" role="alert">
              {{$errors->first()}}
            </div>
          @endif
          <div class="modal-content">
            <div class="col-12 user-img p-2">
              <img class="logo" src="{{asset('img/huc.png')}}" alt="" />
            </div>
            <div><h3>SIGEHOS</h3></div>
            <form method="POST" action="{{url('/validateLogin')}}" class="col-12">
              @csrf
              <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Ingrese Usuario" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Ingrese contraseña" required>
              </div>
              <button type="submit" class="btn btn-primary">
                <i class="" fas fa-sign-in-alt></i>Login
              </button>
            </form>
            <div  id="formFooter">
                <p class="underlineHover" href="../">
                    <hr class="my-4" />
                      Sistema de Gestion Hospitalaria (Mod. Admision)                 
                </p>
            </div>
          </div>
        </div>
      </div>
    </div>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
