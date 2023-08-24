@if(session()->has('success'))
    <div class="card-body">
        <div class="alert alert-danger text-success text-bg-success alert-dismissible"
             role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            <h4 class="alert-heading text-white">{{session('success')}}</h4>
        </div>
    </div>
@endif
