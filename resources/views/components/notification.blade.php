<main class="fixed top-0 w-full">
  @if ($errors->any())
    <div
      id="error-popup"
      class="alert alert-danger absolute right-10 top-0 z-[999] mt-5 rounded-lg bg-red-100 p-5 text-red-500"
    >
      <img src="{{ asset("/storage/icon/warning.svg") }}" alt="warning_icon" class="h-6 w-6" />
      <ul class="mt-2">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  @if (session("error"))
    <div
      id="session-error-popup"
      class="alert alert-danger absolute right-10 top-0 z-[999] mt-5 rounded-lg bg-red-100 p-5 text-red-500"
    >
      <img src="{{ asset("/storage/icon/warning.svg") }}" alt="warning_icon" class="h-6 w-6" />
      <h1 class="mt-2">
        {{ session("error") }}
      </h1>
    </div>
  @endif

  @if (session("success"))
    <div
      id="session-success-popup"
      class="alert alert-danger absolute right-10 top-0 z-[999] mt-5 rounded-lg bg-green-100 p-5 text-green-500"
    >
      <img src="{{ asset("/storage/icon/success.svg") }}" alt="success_icon" class="h-6 w-6" />
      <h1 class="mt-2">
        {{ session("success") }}
      </h1>
    </div>
  @endif
</main>

<script>
  setTimeout(() => {
    const errorPopup = document.getElementById('error-popup');
    const sessionErrorPopup = document.getElementById('session-error-popup');
    const sessionSuccessPopup = document.getElementById('session-success-popup');

    if (errorPopup) {
      errorPopup.style.transition = 'opacity 0.5s ease-out';
      errorPopup.style.opacity = '0';
      setTimeout(() => (errorPopup.style.display = 'none'), 500);
    }

    if (sessionErrorPopup) {
      sessionErrorPopup.style.transition = 'opacity 0.5s ease-out';
      sessionErrorPopup.style.opacity = '0';
      setTimeout(() => (sessionErrorPopup.style.display = 'none'), 500);
    }

    if (sessionSuccessPopup) {
      sessionSuccessPopup.style.transition = 'opacity 0.5s ease-out';
      sessionSuccessPopup.style.opacity = '0';
      setTimeout(() => (sessionSuccessPopup.style.display = 'none'), 500);
    }
  }, 3000);
</script>
