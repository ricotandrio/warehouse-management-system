@extends("layouts.app")
@include("components.notification")

@section("content")
  @include("components.navigation-bar")
  <main class="flex flex-col px-10 py-3 pb-10 pt-5 sm:pt-3">
    <h1 class="mt-10 text-3xl font-semibold">Terms of Use</h1>
    <p class="mt-1 opacity-60">
      Effective date:
      <strong>September 26, 2024</strong>
    </p>

    <p class="mt-5">
      Welcome to our website. By accessing and using this website, you agree to comply with and be bound by the
      following terms and conditions:
    </p>

    <h2 class="mb-1 mt-3 text-xl font-medium">1. Acceptance of Terms</h2>
    <p>
      By using our services, you agree to be bound by these Terms of Use and all applicable laws and regulations. If you
      do not agree with any of these terms, you are prohibited from using or accessing this site.
    </p>

    <h2 class="mb-1 mt-3 text-xl font-medium">2. Modifications to Terms</h2>
    <p>
      We reserve the right to modify these terms at any time. Any changes will be effective immediately upon posting. It
      is your responsibility to review these terms periodically for updates.
    </p>

    <h2 class="mb-1 mt-3 text-xl font-medium">3. Use of Our Website</h2>
    <p>When using our website, you agree to:</p>
    <ol class="ml-5 list-disc">
      <li>Use the website in accordance with all applicable laws and regulations</li>
      <li>Not engage in any behavior that could harm the functionality or security of the website</li>
      <li>Not use the website to distribute viruses, malware, or harmful software</li>
    </ol>

    <h2 class="mb-1 mt-3 text-xl font-medium">4. User Accounts</h2>
    <p>
      In order to access certain features of our website, you may be required to create a user account. You agree to
      provide accurate and complete information during the registration process and to keep your account information
      updated.
    </p>

    <h2 class="mb-1 mt-3 text-xl font-medium">5. Termination of Use</h2>
    <p>
      We reserve the right to terminate or suspend your access to our website at any time, with or without cause, and
      without prior notice.
    </p>

    <h2 class="mb-1 mt-3 text-xl font-medium">6. Intellectual Property</h2>
    <p>
      All content, logos, designs, and graphics on this website are protected by copyright and intellectual property
      laws. You may not use, reproduce, or distribute any of this content without our written permission.
    </p>

    <h2 class="mb-1 mt-3 text-xl font-medium">7. Limitation of Liability</h2>
    <p>
      We are not responsible for any damages or losses resulting from your use of our website. We provide the website
      "as is" and do not offer warranties of any kind.
    </p>

    <h2 class="mb-1 mt-3 text-xl font-medium">8. Governing Law</h2>
    <p>
      These terms are governed by and construed in accordance with the laws of [Your Country], and you agree to submit
      to the jurisdiction of its courts.
    </p>

    <p class="mt-5">
      If you have any questions about these Terms of Use, please
      <a href="mailto:support@example.com" class="underline hover:opacity-60">contact us</a>
      .
    </p>
  </main>
@endsection
