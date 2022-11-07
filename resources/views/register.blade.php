<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register</title>
</head>
<body>
  <section style="background-color: #30348b;">
    <div class="container p-5">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-8 col-xl-6">
          <div class="card rounded-3">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
            class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
            alt="Sample photo">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <div class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>
              <hr>
              <form action="{{ route('register.action') }}" method="post" class="px-md-2">
                @csrf
                <div class="form-group">
                  <label class="form-label" for="label-name">Name</label>
                  <input type="text" id="name" name="name" class="form-control" />
                </div>
                <div class="form-group">
                  <label class="form-label" for="label-email">Email</label>
                  <input type="email" id="email" name="email" class="form-control" />
                </div>
                <div class="form-group">
                  <label class="form-label" for="label-nama">Password</label>
                  <input type="text" id="password" name="password" class="form-control" />
                </div>
                <div class="form-group text-center">
                  <button type="submit" class="btn btn-success btn-md ">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>