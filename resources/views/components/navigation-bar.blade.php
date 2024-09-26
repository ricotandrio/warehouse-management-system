<nav class="flex justify-between px-10 py-5 border-b items-center bg-white">
  <a href="{{ route('dashboard.viewer.page') }}" class="text-xl text-gray-800 font-medium">
    Warehouse
  </a>
  <div class="flex items-center">

    <ul class="flex items-center space-x-6">
      
      <li class="cursor-pointer">
        <a href="{{ auth()->user() ? route('dashboard.viewer.page') : route('login.page') }}">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </a>
      </li>

      <li id="side-bar-open" class="flex flex-row items-center justify-center cursor-pointer">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path d="M20 6.5H4V5H20V6.5ZM20 11.25H4V12.75H20V11.25ZM20 17.5H4V19H20V17.5Z" fill="black"></path>
        </svg>
        <h1 class="text-sm ml-2">MENU</h1>
      </li>      
    </ul>
  </div>

</nav>
<section id="side-bar" class="overflow-y-scroll duration-100 ease-linear opacity-0 -z-10 w-full border fixed top-0 h-screen bg-black bg-opacity-50">
  <div class="w-[30%] absolute right-0 bg-white min-h-screen p-10 border">
    <div id="side-bar-close" class="cursor-pointer w-full flex flex-row items-center justify-end">
      <h1 class="text-sm mr-2 mt-0.5">CLOSE</h1>
      <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none">
        <path d="M20.7457 3.32851C20.3552 2.93798 19.722 2.93798 19.3315 3.32851L12.0371 10.6229L4.74275 3.32851C4.35223 2.93798 3.71906 2.93798 3.32854 3.32851C2.93801 3.71903 2.93801 4.3522 3.32854 4.74272L10.6229 12.0371L3.32856 19.3314C2.93803 19.722 2.93803 20.3551 3.32856 20.7457C3.71908 21.1362 4.35225 21.1362 4.74277 20.7457L12.0371 13.4513L19.3315 20.7457C19.722 21.1362 20.3552 21.1362 20.7457 20.7457C21.1362 20.3551 21.1362 19.722 20.7457 19.3315L13.4513 12.0371L20.7457 4.74272C21.1362 4.3522 21.1362 3.71903 20.7457 3.32851Z" fill="#0F0F0F"/>
      </svg>
    </div>
    <ul class="mt-10">
      <li class="group flex flex-row items-start justify-start mt-3">
        <a href="">Profile</a>
        <svg class="opacity-0 duration-300 ease-linear group-hover:opacity-100" width="24" height="24" xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none">
          <path d="M10 16L14 12L10 8" stroke="#200E32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </li>
      <li class="group flex flex-row items-start justify-start mt-3">
        <a href="">Dashboard</a>
        <svg class="opacity-0 duration-300 ease-linear group-hover:opacity-100" width="24" height="24" xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none">
          <path d="M10 16L14 12L10 8" stroke="#200E32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </li>
      <li class="group flex flex-row items-start justify-start mt-3">
        <a href="">Product Category</a>
        <svg class="opacity-0 duration-300 ease-linear group-hover:opacity-100" width="24" height="24" xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none">
          <path d="M10 16L14 12L10 8" stroke="#200E32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </li>
      <li class="group flex flex-row items-start justify-start mt-3">
        <a href="">Product Manufacturer</a>
        <svg class="opacity-0 duration-300 ease-linear group-hover:opacity-100" width="24" height="24" xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none">
          <path d="M10 16L14 12L10 8" stroke="#200E32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </li>
    </ul>

    <ul class="mt-16">
      <li class="mt-1">
        <a href="{{ route('login.page') }}" class="underline hover:opacity-60">Login</a>
      </li>
      <li class="mt-1">
        <a href="" class="underline hover:opacity-60">Contact Us</a>
      </li>
      <li class="mt-1">
        <a href="{{ route('privacy-policy.page') }}" class="underline hover:opacity-60">Privacy Policy</a>
      </li>
      <li class="mt-1">
        <a href="{{ route('terms-and-conditions.page') }}" class="underline hover:opacity-60">Terms of Use</a>
      </li>
    </ul>
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
</script>