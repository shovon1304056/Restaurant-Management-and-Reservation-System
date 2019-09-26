@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert"
                        aria-label="Close"
                        onclick="this.parentElement.style.display='none';">
                    <i class="material-icons">close</i>
                </button>
                <span>
                      <b> Danger - </b> You Have to Fill them</span>
            </div>
        @endforeach
    </ul>

@endif

@if (session('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                onclick="this.parentElement.style.display='none';">
            <i class="material-icons">close</i>
        </button>
        <span>
                      <b> {{session('success')}}</b> </span>
    </div>

@endif
