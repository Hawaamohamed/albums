
<div class="padding p-b-0">
    <div class="row">
        <div class="col-md-6">
            @if(Session::has('seccessMessage'))
                <div class="alert alert-success" style="padding: 10px"> 
                    {{ Session::get('seccessMessage') }}
                </div>
            @endif
            @if(Session::has('errorMessage'))
                <div class="alert alert-danger"  style="padding: 10px"> 
                    {{ Session::get('errorMessage') }}
                </div>
            @endif
        </div>
    </div>
</div>
 

<div class="row">
  

    <!-- name Field -->
    <div class="form-group col-sm-6 col-lg-6 mb-3">
        {!! Form::label('name', 'Album Name'.'*') !!}
        {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name')?' is-invalid':'')  ]) !!}
        @if ($errors->has('name'))
            <span class="invalid-feedback">
              <small class="text-danger">{{ $errors->first('name') }}</small>
            </span>
        @endif
    </div>
 
</div>
 
@if(empty($album))
    <div class="form-group col-sm-6 col-lg-6 mb-3">
        <button type="button" class="btn btn-success add-new-picture">Add Picture</button>
    </div>
    <!-- pictures  --> 
    <div class="row hidden pictures">
        
        <!-- picture Name Field -->
        <div class="form-group col-sm-6 col-lg-6 mb-3">
            {!! Form::label('picture_name', 'Picture Name'.'*') !!}
            {!! Form::text('picture_name[]', null, ['class' => 'form-control' . ($errors->has('picture_name')?' is-invalid':'')  ]) !!}
            @if ($errors->has('picture_name'))
                <span class="invalid-feedback">
                <small class="text-danger">{{ $errors->first('picture_name') }}</small>
                </span>
            @endif
        </div>
        <!-- picture Field -->
        <div class="form-group col-sm-6 col-lg-6 mb-3">
            {!! Form::label('picture', 'Picture') !!}
            {!! Form::file('picture[]', null, ['class' => 'form-control' . ($errors->has('picture')?' is-invalid':'') ,'accept'=>'image/*' ]) !!}
            @if ($errors->has('picture'))
                <span class="invalid-feedback">
                <small class="text-danger">{{ $errors->first('picture') }}</small>
                </span>
            @endif
        </div>
        
    </div>
 
@endif   
    <!-- Submit Field -->
    <div class="form-group col-sm-12 col-lg-12">
        <div class="btn-showcase">
            {!! Form::submit(ucfirst('Save'), ['class' => 'btn btn-primary']) !!} 
        </div>
    </div>
 
@push('css')
@endpush
@push('vendor-scripts')
 <script>
    $(document).on('click', '.add-new-picture', function(){
       var picture = $(".pictures").first().clone(); 
       picture.insertAfter(".pictures").last();
       picture.removeClass('hidden');
       picture.children().children('input').val('');
    });


 </script>
@endpush
