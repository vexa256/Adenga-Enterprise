<div class="col-md-12">
  <div class="callout callout-info">
                  <h5>{{ $Title }}</h5>

                  <p>Only countries added to the system will be supported</p>
                </div>
</div>
<div class="col-md-12">
<div class="card container-fluid">
              <div class="card-header border-transparent">
                <h3 class="card-title">Use this interface to manage supported coutries


                </h3>
                <a data-toggle="modal" href="#AddCountry" class="btn btn-danger float-right shadow-lg btn-sm">

                  <i class="fas fa-plus"></i>

                Add Country</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Date Created</th>
                      <th>Country Name</th>
                      <th>Remove Entry</th>
                     
                    </tr>
                    </thead>
                    <tbody>
                      @isset($Countries)
                        @foreach ($Countries as $data)
                        <tr>
                      <td style="padding: 10px !important" >
                        {{ date('F/j/Y',strtotime($data->created_at)) }} </td>
                      <td style="padding:10px !important" >{{ $data->Country }}</td>
    <td><a 
      data-ID = "{{ $data->id }}"  
      data-Path = "{{ route('DeleteCountry', ['id' => $data->id]) }}"  
      data-prompt ="Are you sure you want to delete this entry?"  
      href="#" class="btn DeleteElement btn-danger shadow-lg btn-sm">
      
      <i class="fas fa-trash"></i>

    </a></td>
                            </tr>
                     
                        @endforeach
                      @endisset
                   
                     
              
                  
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer -->
            </div>
          </div>


<div class="modal" tabindex="-1" role="dialog" id="AddCountry">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Country Creation Interface</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form  class="card-body col-12" method="POST" action="{{ route('CreateCountry') }}">
        @csrf
        
                  <div class="form-group">
                    <label class="label">Country Name</label>
                    <input required name="Country" type="text" class="form-control"  placeholder="Country Name">
                  </div>
              
              




      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>

    </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



