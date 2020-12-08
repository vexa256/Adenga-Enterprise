<div class="col-md-12">
  <div class="callout callout-info">
                  <h5>{{ $Title }}</h5>

                  <p>Courses, instructors, departments , etc are all attached to particular institution</p>
                </div>
</div>
<div class="col-md-12">
<div class="card container-fluid">
              <div class="card-header border-transparent">
                <h3 class="card-title">Use this interface to manage institutions


                </h3>
                <a data-toggle="modal" href="#AddCountry" class="btn btn-danger float-right shadow-lg btn-sm">

                  <i class="fas fa-plus"></i>

                Add Institution</a>

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
                <div class="mt-1">
                  <table style="width: 100% !important" class="display nowrap table m-0 data  table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Institution Name</th>
                      <th>Country </th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Description</th>
                      <th>Delete</th>

                    </tr>
                    </thead>
                    <tbody>
                      @isset($University)
                        @foreach ($University as $data)
                        <tr>

                          <td>{{ $data->InstitutionName }}</td>
                          <td>{{ $data->Country }}</td>
                          <td>{{ $data->Address }}</td>
                          <td>{{ $data->Phone }}</td>
                          <td>{{ $data->Email }}</td>
                          <td>

                            <a data-name="{{ $data->InstitutionName }}" data-toggle="modal" href="#views{{ $data->id }}" class="btn btn-sm viewdesc btn-primary shadow-lg">
                              <i class="fas fa-binoculars"></i> View

                            </a>

                          </td>

                          <td><a href="#" data-name="institution" data-id=""  data-route="{{ route('DeleteInstitution', ['id' => $data->id]) }}"  class="btn btn-danger deleteme shadow-lg btn-sm">

                            <i class="fas fa-trash"></i>  Delete

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

<form class="" action="{{ route('CreateInstitution') }}" method="POST">
<div class="modal"  id="AddCountry">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Institution Creation Interface</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">




        <div class="row">
                    <div class="col-md-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Institution Name</label>
                        <input name="InstitutionName"  type="text" required  class="form-control" >
                      </div>
                    </div>
                   <div class="col-md-4">
                      <!-- text input -->
                      <div class="form-group">
              <label>Country </label>
              <select required name ="Country" class="getdesc form-control select2bs4">
                <option selected="selected"></option>

                @isset($Countries)
                @foreach ($Countries as $data)


                <option>{{ $data->Country }}</option>

                @endforeach
                @endisset

              </select>
                      </div>
                    </div>
                     <div class="col-md-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Address</label>
                        <input name="Address"  type="text" required  class="form-control" >
                      </div>
                    </div>

                      <div class="col-md-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Phone</label>
                        <input name="Phone"  type="text" required  class="form-control" >
                      </div>
                    </div>


                    <div class="col-md-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Email</label>
                        <input name="Email"  type="email" required  class="form-control" >
                      </div>
                    </div>


                      <div class="col-md-12">
                          <label>Brief Description</label>

                        <textarea name="Description" class="app_letters"></textarea>

                      </div>
                    </div>

                    @csrf





      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>


        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 </form>


 @isset($University)
                        @foreach ($University as $data)

<div class="modal"  id="views{{ $data->id }}">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Description for the institution <span  class="seeme text-danger">

        </span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <textarea name="Description{{ $data->id }}" class="app_letters">

            {{ $data->Description }}

          </textarea>


      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


   @endforeach
                      @endisset
