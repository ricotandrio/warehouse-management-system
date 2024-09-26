<main class="fixed top-0 w-full">
  @if ($errors->any())
    <div
      id="error-popup"
      class="alert alert-danger absolute right-10 top-0 mt-5 rounded-lg bg-red-100 p-5 text-red-500"
    >
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
          <path
            d="M12 16.99V17M12 7V14M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
            stroke="rgb(239 68 68)"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round"
          ></path>
        </g>
      </svg>
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
      class="alert alert-danger absolute right-10 top-0 mt-5 rounded-lg bg-red-100 p-5 text-red-500"
    >
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
          <path
            d="M12 16.99V17M12 7V14M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
            stroke="rgb(239 68 68)"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round"
          ></path>
        </g>
      </svg>
      <h1 class="mt-2">
        {{ session("error") }}
      </h1>
    </div>
  @endif

  @if (session("success"))
    <div
      id="session-success-popup"
      class="alert alert-danger absolute right-10 top-0 mt-5 rounded-lg bg-green-100 p-5 text-green-500"
    >
      <svg
        width="24"
        height="24"
        fill="#22c55e"
        viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg"
        stroke="#22c55e"
      >
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
          <path
            fill-rule="evenodd"
            d="M12,2 C17.5228475,2 22,6.4771525 22,12 C22,17.5228475 17.5228475,22 12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 Z M12,4 C7.581722,4 4,7.581722 4,12 C4,16.418278 7.581722,20 12,20 C16.418278,20 20,16.418278 20,12 C20,7.581722 16.418278,4 12,4 Z M15.2928932,8.29289322 L10,13.5857864 L8.70710678,12.2928932 C8.31658249,11.9023689 7.68341751,11.9023689 7.29289322,12.2928932 C6.90236893,12.6834175 6.90236893,13.3165825 7.29289322,13.7071068 L9.29289322,15.7071068 C9.68341751,16.0976311 10.3165825,16.0976311 10.7071068,15.7071068 L16.7071068,9.70710678 C17.0976311,9.31658249 17.0976311,8.68341751 16.7071068,8.29289322 C16.3165825,7.90236893 15.6834175,7.90236893 15.2928932,8.29289322 Z"
          ></path>
        </g>
      </svg>
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
