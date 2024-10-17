@include("layouts.app")

<section class="mt-14 bg-black">
  <div class="mx-auto max-w-screen-xl space-y-8 overflow-hidden px-4 py-12 sm:px-6 lg:px-8">
    <nav class="-mx-5 -my-2 flex flex-wrap justify-center">
      <div class="px-5 py-2">
        <a href="{{ route("contact-us.page") }}" class="text-base leading-6 text-gray-500 hover:text-white">Contact</a>
      </div>
      <div class="px-5 py-2">
        <a href="{{ route("privacy-policy.page") }}" class="text-base leading-6 text-gray-500 hover:text-white">
          Privacy Policy
        </a>
      </div>
      <div class="px-5 py-2">
        <a href="{{ route("terms-and-conditions.page") }}" class="text-base leading-6 text-gray-500 hover:text-white">
          Terms of Use
        </a>
      </div>
    </nav>
    <div class="mt-8 flex justify-center space-x-6">
      <a href="#" class="text-gray-400 hover:text-white">
        <span class="sr-only">Facebook</span>
        <img class="h-6 w-6" src="{{ asset('/storage/socials/facebook.svg') }}" alt="facebook_icon">
      </a>
      <a href="#" class="text-gray-400 hover:text-white">
        <span class="sr-only">Instagram</span>
        <img class="w-6 h-6" src="{{ asset('/storage/socials/instagram.svg') }}" alt="instagram_icon">
      </a>
      <a href="#" class="text-gray-400 hover:text-white">
        <span class="sr-only">Twitter</span>
        <img class="w-6 h-6" src="{{ asset('/storage/socials/twitter.svg') }}" alt="twitter_icon">
      </a>
    </div>
    <p class="mt-8 text-center text-base leading-6 text-gray-400">© 2024 Warehouse, Inc. All rights reserved.</p>
  </div>
</section>
