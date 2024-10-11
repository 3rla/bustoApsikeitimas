<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Policy - {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="text-gray-800 bg-gray-50">
    <x-cookie-banner />

    <!-- Navbar -->
    <livewire:navbar />

    <div class="min-h-screen">
        <header class="py-16 text-white bg-gradient-to-r from-blue-500 to-indigo-600">
            <div class="container px-4 mx-auto sm:px-6 lg:px-8">
                <h1 class="mb-2 text-4xl font-bold">Cookie Policy</h1>
                <p class="text-xl">Understanding how we use cookies on {{ config('app.name') }}</p>
            </div>
        </header>

        <main class="py-12">
            <div class="container px-4 mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white rounded-lg shadow-xl">
                    <div class="p-6 sm:p-10">
                        <h2 class="mb-6 text-3xl font-bold text-gray-900">Cookie Policy for {{ config('app.name') }}
                        </h2>

                        <div class="space-y-8">
                            <section>
                                <p class="text-lg text-gray-700">This Cookie Policy explains how
                                    {{ config('app.name') }} ("we", "us", and "our") uses cookies and similar
                                    technologies to recognize you when you visit our website. It explains what these
                                    technologies are and why we use them, as well as your rights to control our use of
                                    them.</p>
                            </section>

                            <section>
                                <h3 class="mb-3 text-2xl font-semibold text-gray-900">What are cookies?</h3>
                                <p class="text-gray-700">Cookies are small data files that are placed on your computer
                                    or mobile device when you visit a website. Cookies are widely used by website owners
                                    in order to make their websites work, or to work more efficiently, as well as to
                                    provide reporting information.</p>
                            </section>

                            <section>
                                <h3 class="mb-3 text-2xl font-semibold text-gray-900">Why do we use cookies?</h3>
                                <p class="text-gray-700">We use cookies for several reasons. Some cookies are required
                                    for technical reasons in order for our website to operate, and we refer to these as
                                    "essential" or "strictly necessary" cookies. Other cookies also enable us to track
                                    and target the interests of our users to enhance the experience on our website.
                                    Third parties serve cookies through our website for advertising, analytics and other
                                    purposes.</p>
                            </section>

                            <section>
                                <h3 class="mb-3 text-2xl font-semibold text-gray-900">How can I control cookies?</h3>
                                <p class="text-gray-700">You have the right to decide whether to accept or reject
                                    cookies. You can exercise your cookie rights by setting your preferences in the
                                    Cookie Consent Manager. The Cookie Consent Manager allows you to select which
                                    categories of cookies you accept or reject. Essential cookies cannot be rejected as
                                    they are strictly necessary to provide you with services.</p>
                            </section>

                            <section>
                                <h3 class="mb-3 text-2xl font-semibold text-gray-900">Changes to this Cookie Policy</h3>
                                <p class="text-gray-700">We may update this Cookie Policy from time to time in order to
                                    reflect, for example, changes to the cookies we use or for other operational, legal
                                    or regulatory reasons. Please therefore re-visit this Cookie Policy regularly to
                                    stay informed about our use of cookies and related technologies.</p>
                            </section>

                            <section>
                                <p class="text-gray-700">If you have any questions about our use of cookies or other
                                    technologies, please email us at <a href="mailto:{{ config('mail.from.address') }}"
                                        class="text-blue-600 hover:underline">{{ config('mail.from.address') }}</a>.</p>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <livewire:footer />

    @livewireScripts
</body>

</html>
