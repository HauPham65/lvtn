  @if (session('msg'))
      <div class="alert alert-{{ session('type') }}" role="alert">
          <strong>{{ session('msg') }}</strong>
      </div>
  @endif
