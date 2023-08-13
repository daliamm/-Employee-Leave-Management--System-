
<div class="modal modal-blur fade" id="leave-type-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <form action="{{ route('employees.store') }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title">New Leave Type</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
           <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Your Name" value="">

              @error('name')
              <small class="invalid-feedback">{{ $message }}</small>
              @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Your Email" value="">

                @error('email')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="password" placeholder="Your Password" value="">

                @error('password')
                <small class="invalid-feedback">{{ $message }}</small>
                @enderror
              </div>

          </div>

          <div class="modal-footer">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
              Cancel
            </a>

            <button type="submit" class="btn btn-primary ms-auto" >
                Create new leave type
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
