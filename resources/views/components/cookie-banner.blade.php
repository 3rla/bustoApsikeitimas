<div x-data="{ showBanner: !localStorage.getItem('cookieConsent') }" x-show="showBanner" x-transition
    class="fixed bottom-0 left-0 right-0 z-50 p-4 text-white bg-gray-800">
    <div class="flex flex-col items-center justify-between mx-auto space-y-2 max-w-7xl sm:flex-row sm:space-y-0">
        <div class="text-sm text-center sm:text-left">
            <p>
                We use cookies to improve your experience on our site. By continuing to use our site, you agree to our
                use
                of cookies.
            </p>
            <a href="{{ route('cookie-policy') }}" class="underline hover:text-gray-300">Read our Cookie Policy</a>
        </div>
        <div class="flex space-x-2">
            <button @click="localStorage.setItem('cookieConsent', 'true'); showBanner = false"
                class="px-4 py-2 text-sm font-medium text-gray-800 transition bg-white rounded-md hover:bg-gray-200">
                Accept
            </button>
            <button @click="localStorage.setItem('cookieConsent', 'false'); showBanner = false"
                class="px-4 py-2 text-sm font-medium text-white transition bg-gray-700 rounded-md hover:bg-gray-600">
                Decline
            </button>
        </div>
    </div>
</div>
