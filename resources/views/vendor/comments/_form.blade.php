<h5 style="color: #3490dc; margin-bottom: 20px; padding: 15px 10px; background: #fff; box-shadow: 0px 5px 15px 3px rgba(177, 174, 174, 0.2); border-left: 3px solid rgba(52, 144, 220, 0.7); box-shadow: 0px 5px 15px 3px rgba(177, 174, 174, 0.3);"><strong><i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp; Post Your Comment Here </strong></h5>
<div class="card" style="margin-bottom: 15px;">
    <div class="card-body">
        @if($errors->has('commentable_type'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->first('commentable_type') }}
            </div>
        @endif
        @if($errors->has('commentable_id'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->first('commentable_id') }}
            </div>
        @endif
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            @honeypot
            <input type="hidden" name="commentable_type" value="\{{ get_class($model) }}" />
            <input type="hidden" name="commentable_id" value="{{ $model->getKey() }}" />

            {{-- Guest commenting --}}
            @if(isset($guest_commenting) and $guest_commenting == true)
                <div class="form-group">
                    <label for="message">Enter your name here:</label>
                    <input type="text" class="form-control @if($errors->has('guest_name')) is-invalid @endif" name="guest_name" />
                    @error('guest_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="message">Enter your email here:</label>
                    <input type="email" class="form-control @if($errors->has('guest_email')) is-invalid @endif" name="guest_email" />
                    @error('guest_email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            @endif

            <div class="form-group">
                <label for="message">Enter your message here:</label>
                <textarea class="form-control @if($errors->has('message')) is-invalid @endif" name="message" rows="3"></textarea>
                <div class="invalid-feedback">
                    Your message is required.
                </div>
                </div>
            <button type="submit" class="btn btn-sm btn-outline-primary text-uppercase">Submit</button>
        </form>
    </div>
</div>
<br />