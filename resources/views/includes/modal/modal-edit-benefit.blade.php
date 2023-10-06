  <div class="modal fade" id="editCampBenefit{{ $benefit->id }}" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalLabelCampBenefits" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelCampBenefits">Edit {{ $benefit->name }}</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <form action="{{ route('camp-benefits.update', [$camp, $benefit->id]) }}" method="post">
                  @method('put')
                  @csrf
                  <div class="modal-body text-left">
                      <div class="mb-3">
                          <label for="title" class="form-label">Name Camp Benefit</label>
                          <input type="text" name="name" value="{{ $benefit->name }}"
                              class="form-control @error('name') is-invalid @enderror" id="name"
                              placeholder="Camp benefit..">
                          @error('name')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                      <button class="btn btn-warning btn-sm" type="submit">Edit</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
