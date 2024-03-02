@extends('layouts.app')

@section('content')
<div class="row" style="margin-top: 10%;">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h5 class="mb-3">Login</h5>
        <form method="POST" action="{{ route('login') }}">
            @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input
                  type="email"
                  class="form-control"
                  id="tb-email"
                  name="email"
                />
                <label for="tb-email">Email address</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input
                  type="password"
                  class="form-control"
                  id="tb-pwd"
                  name="password"
                />
                <label for="tb-pwd">Password</label>
              </div>
            </div>
            <div class="col-12">
              <div class="d-md-flex align-items-center mt-3">
                <div class="ms-auto mt-3 mt-md-0">
                  <button
                    type="submit"
                    class="btn btn-black font-medium rounded-pill px-4"
                  >
                    <div class="d-flex align-items-center">
                      <i class="ti ti-send me-2 fs-4"></i>
                      Login
                    </div>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
