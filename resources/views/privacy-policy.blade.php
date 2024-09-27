@extends("layouts.app")
@include("components.notification")

@section("content")
  @include("components.navigation-bar")
  <main class="flex flex-col px-10 py-3 pb-10 pt-5 sm:pt-3">
    <h1 class="mt-10 text-3xl font-semibold">Privacy Policy</h1>
    <p class="mt-1 opacity-60">
      Effective date:
      <strong>September 26, 2024</strong>
    </p>

    <p class="mt-5">
      This Privacy Policy explains how we collect, use, and protect your personal information when you use our website.
    </p>

    <h2 class="mb-1 mt-3 text-xl font-medium">1. Information We Collect</h2>
    <p>We may collect the following types of information:</p>
    <ol class="list-disc">
      <li class="ml-5">Personal identification information (Name, email address, phone number, etc.)</li>
      <li class="ml-5">Usage data (Pages visited, time spent on the site, etc.)</li>
    </ol>

    <h2 class="mb-1 mt-3 text-xl font-medium">2. How We Use Your Information</h2>
    <p>We use the collected information to:</p>
    <ol class="list-disc">
      <li class="ml-5">Provide and maintain our services</li>
      <li class="ml-5">Notify you about updates and changes</li>
      <li class="ml-5">Analyze site usage and improve our website</li>
    </ol>

    <h2 class="mb-1 mt-3 text-xl font-medium">3. Sharing of Information</h2>
    <p>We do not share your personal information with third parties, except in the following circumstances:</p>
    <ol class="list-disc">
      <li class="ml-5">With your consent</li>
      <li class="ml-5">To comply with legal obligations</li>
    </ol>

    <h2 class="mb-1 mt-3 text-xl font-medium">4. Your Privacy Rights</h2>
    <p>You have the right to:</p>
    <ol class="list-disc">
      <li class="ml-5">Access the information we hold about you</li>
      <li class="ml-5">Request the correction or deletion of your information</li>
    </ol>

    <h2 class="mb-1 mt-3 text-xl font-medium">5. Changes to This Privacy Policy</h2>
    <p>
      We may update our Privacy Policy from time to time. You are advised to review this page periodically for any
      changes.
    </p>

    <p class="mt-5">
      If you have any questions about our Privacy Policy, please
      <a href="mailto:support@example.com" class="underline hover:opacity-60">contact us</a>
      .
    </p>
  </main>
  @include("components.footer")
@endsection
