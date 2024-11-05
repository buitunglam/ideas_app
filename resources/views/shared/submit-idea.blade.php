@auth
    <h4> Share yours ideas </h4>
    <div class="row">
        <form action="{{ route('ideas.create') }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea class="form-control" id="idea" name="idea" rows="3"></textarea>
                @error('idea')
                    <span class="fs-6 text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark"> Share </button>
            </div>
        </form>
    </div>
@endauth
@guest
    <h4>Login to share your ideas</h4>
@endguest
