  <div class="modal fade" id="showUser{{ $user->username }}" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalLabelUser" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelUser">Detail {{ $user->name }}</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body text-left">
                  @if ($user->bio)
                      <div class="text-center my-3">
                          <span class="text-capitalize font-italic">
                              {{ $user->bio ?? '-' }}
                          </span>
                          <br>
                          <span style="color: #111">#{{ $user->username }}</span>
                      </div>
                  @endif
                  <div class="table-responsive">
                      <table class="table table-bordered tab-sm" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                  <th class='text-center'>Name</th>
                                  <th class='text-center'>Username</th>
                                  <th class='text-center'>Email</th>
                                  <th class='text-center'>occupation</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td class='text-center'>{{ $user->name }}</td>
                                  <td class='text-center'>{{ $user->username }}</td>
                                  <td class='text-center'>{{ $user->email }}</td>
                                  <td class='text-center'>{{ $user->occupation ?? '-' }}</td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
