<nav class="flex items-center justify-between border-b bg-white px-10 py-5">
  <a href="{{ route("dashboard.viewer.page") }}" class="text-xl font-medium text-gray-800">Warehouse</a>
  <div class="flex items-center">
    <ul class="flex items-center space-x-6">
      <li class="cursor-pointer hover:opacity-60">
        <a href="{{ auth()->check() ? route("user.profile.page") : route("login.page") }}">
          <img src="{{ asset("/storage/icon/user_profile.svg") }}" alt="user_profile_icon" class="h-6 w-6" />
        </a>
      </li>

      <li id="side-bar-open" class="flex cursor-pointer flex-row items-center justify-center hover:opacity-60">
        <img src="{{ asset("/storage/icon/menu.svg") }}" alt="user_profile_icon" class="h-6 w-6" />
        <h1 class="ml-2 text-sm">MENU</h1>
      </li>
    </ul>
  </div>
</nav>
<section
  id="side-bar"
  class="fixed top-0 -z-10 h-screen w-full overflow-y-scroll border bg-black bg-opacity-50 opacity-0 duration-100 ease-linear"
>
  <div class="absolute right-0 min-h-screen w-full border bg-white p-10 sm:w-[30%]">
    <div class="flex w-full flex-row items-center justify-end">
      <div id="side-bar-close" class="inline-flex cursor-pointer hover:opacity-60">
        <h1 class="mr-2 mt-0.5 text-sm">CLOSE</h1>
        <img src="{{ asset("/storage/icon/x.svg") }}" alt="close_icon" class="h-6 w-6" />
      </div>
    </div>
    <ul class="mt-10">
      <li class="group mt-3 flex flex-row items-start justify-start">
        <a href="{{ route("product-categories.page") }}">Product Categories</a>
        <img
          src="{{ asset("/storage/icon/toleft.svg") }}"
          alt="toleft_icon"
          class="h-6 w-6 opacity-0 duration-300 ease-linear group-hover:opacity-100"
        />
      </li>
      <li class="group mt-3 flex flex-row items-start justify-start">
        <a href="">Product Manufacturers</a>
        <img
          src="{{ asset("/storage/icon/toleft.svg") }}"
          alt="toleft_icon"
          class="h-6 w-6 opacity-0 duration-300 ease-linear group-hover:opacity-100"
        />
      </li>
    </ul>

    <ul class="mt-10">
      @if (! auth()->check())
        <li class="mt-1">
          <a href="{{ route("login.page") }}" class="underline hover:opacity-60">Login</a>
        </li>
      @endif

      <li class="mt-1">
        <a href="#" class="underline hover:opacity-60">About</a>
      </li>
      <li class="mt-1">
        <a href="#" class="underline hover:opacity-60">Team</a>
      </li>
      <li class="mt-1">
        <a href="{{ route("contact-us.page") }}" class="underline hover:opacity-60">Contact Us</a>
      </li>
      <li class="mt-1">
        <a href="{{ route("privacy-policy.page") }}" class="underline hover:opacity-60">Privacy Policy</a>
      </li>
      <li class="mt-1">
        <a href="{{ route("terms-and-conditions.page") }}" class="underline hover:opacity-60">Terms of Use</a>
      </li>
    </ul>

    @if (auth()->check())
      <div class="mt-24"></div>
      <form action="{{ route("logout.action") }}" method="POST" class="inline hover:opacity-60">
        @csrf
        <button type="submit">Logout</button>
      </form>
    @endif
  </div>
</section>

<script>
  const sideBar = document.getElementById('side-bar');
  const sideBarClose = document.getElementById('side-bar-close');
  const sideBarOpen = document.getElementById('side-bar-open');

  sideBarOpen.addEventListener('click', () => {
    sideBar.style.opacity = '100%';
    sideBar.style.zIndex = '1000';
  });

  sideBarClose.addEventListener('click', () => {
    sideBar.style.opacity = '0%';
    sideBar.style.zIndex = '-1';
  });

  sideBar.addEventListener('click', () => {
    sideBar.style.opacity = '0%';
    sideBar.style.zIndex = '-1';
  });

  sideBar.children[0].addEventListener('click', (event) => {
    event.stopPropagation();
  });
</script>
