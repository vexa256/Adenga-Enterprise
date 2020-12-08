<div class="col-md-12">
  <div class="callout callout-danger shadow-lg">
    <h3>  <i class="fas fa-cloud text-primary fa-2x"></i>  {!! $Title !!}

      <small class="text-danger">Selected Course is {{ $Course }}</small>
    </h3>
  </div>
</div>
<div class="container col-md-6">
  <div class="card">
    <div class="card-header border-transparent">
      <h3 class="card-title">Course audio based learning content
      </h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class=" table-primary table-bordered table-striped table m-0">
          <thead>
            <tr>
              <th>Course</th>
              <th>Audio Title</th>
              <th>Description</th>
              <th>Play</th>
            </tr>
          </thead>
          <tbody>
            @isset($Audio)
            @foreach ($Audio as $data)
            <tr>
              <td>{{ $Course }}</td>
              <td>{{ $data->AudioName }}</td>
              <td>
                <a data-name="{{ $data->AudioName }}" href="#etet{{ $data->id }}" data-toggle="modal" class="btn-primary seada btn-sm shadow-lg">
                  <i class="fas fa-binoculars"></i> View
                </a>
              </td>
              <td>  <a data-name="{{ $data->AudioName }}" href="#etets{{ $data->id }}" data-toggle="modal" class="btn-primary seada btn-sm shadow-lg">
                <i class="fas fa-play-circle"></i> Play
              </a>
            </td>
          </tr>
          @endforeach
          @endisset
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
@isset($Audio)
@foreach ($Audio as $data)
<div class="modal"  id="etet{{ $data->id }}">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Audio content :: <span class="text-danger font-weight-bold screenme"></span></h5>
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
@isset($Audio)
@foreach ($Audio as $data)
<div class="modal"  id="etets{{ $data->id }}">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Play Audio content :: <span class="text-danger font-weight-bold screenme"></span></h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Audio Course Content Player</h3>
        </div>
        <div class="card-body">
          <audio class="container-fluid" controls="controls" >
            <source src="{{ url($data->Url) }}" type="audio/mpeg">
            Your browser does not support the audio element.
          </audio>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>
@endforeach
@endisset
<div class="container col-md-6">
<div class="card">
  <div class="card-header border-transparent">
    <h3 class="card-title">Course document  based learning content
    </h3>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table-dark table-bordered table-striped table m-0">
        <thead>
          <tr>
            <th>Course</th>
            <th>Document Title</th>
            <th>Description</th>
            <th>Read</th>
          </tr>
        </thead>
        <tbody>
          @isset($Documents)
          @foreach ($Documents as $data)
          <tr>
            <td>{{ $Course }}</td>
            <td>{{ $data->DocName }}</td>
            <td>
              <a data-name="{{ $data->DocName }}" href="#shsbnafakss{{ $data->id }}" data-toggle="modal" class="btn-primary seada btn-sm shadow-lg">
                <i class="fas fa-binoculars"></i> View
              </a>
            </td>
            <td>  <a data-name="{{ $data->DocName }}" href="#shsbnafaksss{{ $data->id }}" data-toggle="modal" class="btn-primary seada btn-sm shadow-lg">
              <i class="fas fa-play-circle"></i> View
            </a>
          </td>
        </tr>
        @endforeach
        @endisset
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
@isset($Documents)
@foreach ($Documents as $data)
<div class="modal"  id="shsbnafakss{{ $data->id }}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title">Document content :: <span class="text-danger font-weight-bold screenme"></span></h5>
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
@isset($Documents)
@foreach ($Documents as $data)
<div class="modal"  id="shsbnafaksss{{ $data->id }}">
<div class="modal-dialog modal-xl" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title">Read Document content :: <span class="text-danger font-weight-bold screenme"></span></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Document Course Content Reader</h3>
      </div>
      <div class="card-body">
        @if ($data->pdf == 'true')
        <iframe src="http://docs.google.com/gview?url={{ url($data->Url) }}&embedded=true" style="width:100%; height:400px;" frameborder="0"></iframe>
        @endif
        @if ($data->pdf != 'true')
        <iframe height="400px" class="container-fluid" src='https://view.officeapps.live.com/op/embed.aspx?src={{ url($data->Url) }}'  frameborder='0'></iframe>
        @endif
        <!--  -->
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </div>
</div>
</div>
</div>
@endforeach
@endisset
<div class="container col-md-6">
<div class="card">
<div class="card-header border-transparent">
  <h3 class="card-title">Course text notes based learning content
  </h3>
</div>
<div class="card-body">
  <div class="table-responsive">
    <table class="table-success table-bordered table-striped table m-0">
      <thead>
        <tr>
          <th>Course</th>
          <th>Notes Title</th>
          <th>Notes</th>
        </tr>
      </thead>
      <tbody>
        @isset($Notes)
        @foreach ($Notes as $data)
        <tr>
          <td>{{ $Course }}</td>
          <td>{{ $data->NotesName }}</td>
          <td>
            <a data-name="{{ $data->NotesName }}" href="#nldhvbasnikkskhstgsgs{{ $data->id }}" data-toggle="modal" class="btn-primary seada btn-sm shadow-lg">
              <i class="fas fa-binoculars"></i> View
            </a>
          </td>
        </tr>
        @endforeach
        @endisset
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
@isset($Notes)
@foreach ($Notes as $data)
<div class="modal"  id="nldhvbasnikkskhstgsgs{{ $data->id }}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title">Text Notes :: <span class="text-danger font-weight-bold screenme"></span></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <textarea name="Description{{ $data->id }}" class="app_letters">
    {{ $data->Notes }}
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
<div class="container col-md-6">
<div class="card">
<div class="card-header border-transparent">
  <h3 class="card-title">Course video based learning content
  </h3>
</div>
<div class="card-body">
  <div class="table-responsive">
    <table class="table-warning table-bordered table-striped table m-0">
      <thead>
        <tr>
          <th>Course</th>
          <th>Video Title</th>
          <th>Description</th>
          <th>Play</th>
        </tr>
      </thead>
      <tbody>
        @isset($Video)
        @foreach ($Video as $data)
        <tr>
          <td>{{ $Course }}</td>
          <td>{{ $data->VideoName }}</td>
          <td>
            <a data-name="{{ $data->VideoName }}" href="#sjsshsj{{ $data->id }}" data-toggle="modal" class="btn-primary seada btn-sm shadow-lg">
              <i class="fas fa-binoculars"></i> View
            </a>
          </td>
          <td>  <a data-name="{{ $data->VideoName }}" href="#maghsghvvbsjakalmsdbhsgva{{ $data->id }}" data-toggle="modal" class="btn-primary seada btn-sm shadow-lg">
            <i class="fas fa-play-circle"></i> Play
          </a>
        </td>
      </tr>
      @endforeach
      @endisset
    </tbody>
  </table>
</div>
</div>
</div>
</div>
@isset($Video)
@foreach ($Video as $data)
<div class="modal"  id="sjsshsj{{ $data->id }}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title">Video content :: <span class="text-danger font-weight-bold screenme"></span></h5>
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
@isset($Video)
@foreach ($Video as $data)
<div class="modal"  id="maghsghvvbsjakalmsdbhsgva{{ $data->id }}">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title">Play Video content :: <span class="text-danger font-weight-bold screenme"></span></h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Video Course Content Player</h3>
    </div>
    <div class="card-body">
      <video class="container-fluid" controls>
        <source src="{{ url($data->Url) }}" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
@endforeach
@endisset