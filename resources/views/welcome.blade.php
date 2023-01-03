<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MiLLigram</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <svg width="253" height="75" viewBox="0 0 253 75" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M53.625 7.90625C52.375 11.3646 51.1979 14.875 50.0938 18.4375C48.9896 22 48.0208 25.8125 47.1875 29.875C46.3542 33.9167 45.6875 38.2917 45.1875 43C44.6875 47.6875 44.4271 52.8854 44.4062 58.5938C44.1562 58.7604 43.7812 58.9792 43.2812 59.25C42.8021 59.5417 42.2604 59.8438 41.6562 60.1562C41.0729 60.4896 40.4583 60.8229 39.8125 61.1562C39.1667 61.4896 38.5417 61.8125 37.9375 62.125C37.3542 62.4375 36.8229 62.7188 36.3438 62.9688C35.8646 63.2188 35.5 63.4062 35.25 63.5312C35.2708 61.9688 35.375 60.25 35.5625 58.375C35.75 56.5 36 54.5208 36.3125 52.4375C36.6458 50.375 37.0208 48.2292 37.4375 46C37.875 43.7708 38.3438 41.5208 38.8438 39.25C37.3438 41.2708 35.9062 42.9583 34.5312 44.3125C33.1771 45.6458 31.9688 46.7188 30.9062 47.5312C29.6771 48.4896 28.5312 49.25 27.4688 49.8125C27.0312 50.0625 26.5 50.0833 25.875 49.875C25.25 49.6667 24.625 49.3542 24 48.9375C23.3958 48.5208 22.8333 48.0625 22.3125 47.5625C21.8125 47.0625 21.4583 46.6458 21.25 46.3125C21.0417 45.9792 20.8125 45.0312 20.5625 43.4688C20.3333 41.9062 20.1667 39.6667 20.0625 36.75C19.1667 37.9167 18.1979 39.1458 17.1562 40.4375C16.1146 41.7292 15.0521 43.0208 13.9688 44.3125C12.9062 45.5833 11.8542 46.8229 10.8125 48.0312C9.77083 49.2188 8.80208 50.3125 7.90625 51.3125C6.98958 52.2917 6.17708 53.1354 5.46875 53.8438C4.73958 54.5729 4.17708 55.0938 3.78125 55.4062C3.57292 55.1771 3.32292 54.9167 3.03125 54.625C2.71875 54.3333 2.40625 54.0208 2.09375 53.6875C1.76042 53.375 1.4375 53.0521 1.125 52.7188C0.8125 52.4062 0.541667 52.1042 0.3125 51.8125C3.35417 49.1458 6.4375 45.3854 9.5625 40.5312C12.6875 35.6562 15.6667 29.7917 18.5 22.9375C18.8125 23.2083 19.1042 23.4688 19.375 23.7188C19.6458 23.9688 19.9062 24.2188 20.1562 24.4688C20.3229 21.1771 20.5729 17.5312 20.9062 13.5312C21.2604 9.51042 21.7604 5.05208 22.4062 0.15625C22.5104 0.197917 22.75 0.395833 23.125 0.75C23.5208 1.10417 23.9792 1.55208 24.5 2.09375C25.0208 2.61458 25.5729 3.1875 26.1562 3.8125C26.7396 4.41667 27.2917 5 27.8125 5.5625C28.3542 6.125 28.8229 6.625 29.2188 7.0625C29.6146 7.5 29.8854 7.80208 30.0312 7.96875C29.9896 8.13542 29.8958 8.58333 29.75 9.3125C29.6042 10.0417 29.4271 10.9792 29.2188 12.125C29.0312 13.2708 28.8229 14.5833 28.5938 16.0625C28.3646 17.5417 28.1562 19.1146 27.9688 20.7812C27.7812 22.4271 27.6146 24.1354 27.4688 25.9062C27.3438 27.6562 27.2708 29.375 27.25 31.0625C27.2292 31.7708 27.2083 32.5938 27.1875 33.5312C27.1875 34.4479 27.1875 35.3958 27.1875 36.375C27.1875 37.3542 27.1979 38.3229 27.2188 39.2812C27.2604 40.2188 27.3125 41.0729 27.375 41.8438C27.4375 42.5938 27.5208 43.2188 27.625 43.7188C27.75 44.1979 27.9062 44.4583 28.0938 44.5C28.3229 44.5625 28.875 44.2604 29.75 43.5938C30.625 42.9271 31.6771 41.9479 32.9062 40.6562C34.1354 39.3646 35.4688 37.8021 36.9062 35.9688C38.3646 34.1146 39.7708 32.0417 41.125 29.75C41.75 27.3125 42.375 24.9583 43 22.6875C43.6458 20.4167 44.2604 18.3125 44.8438 16.375C45.4479 14.4375 46.0104 12.7083 46.5312 11.1875C47.0521 9.64583 47.5208 8.38542 47.9375 7.40625C48.3542 7.42708 48.8229 7.45833 49.3438 7.5C49.8854 7.52083 50.4271 7.5625 50.9688 7.625C51.5104 7.66667 52.0104 7.71875 52.4688 7.78125C52.9479 7.82292 53.3333 7.86458 53.625 7.90625ZM54.1875 53.7188C53.875 53.7188 53.4792 53.6042 53 53.375C52.5208 53.1667 52.0625 52.8958 51.625 52.5625C51.1875 52.25 50.8125 51.8958 50.5 51.5C50.1875 51.1042 50.0312 50.7188 50.0312 50.3438C50.2396 49.4271 50.5208 48.375 50.875 47.1875C51.2292 46 51.6146 44.7917 52.0312 43.5625C52.4271 42.3333 52.8542 41.1354 53.3125 39.9688C53.75 38.7812 54.1458 37.7292 54.5 36.8125C54.875 35.8958 55.1979 35.1562 55.4688 34.5938C55.7396 34.0312 55.9167 33.75 56 33.75C56.125 33.75 56.4375 33.8854 56.9375 34.1562C57.4375 34.4271 57.9583 34.7604 58.5 35.1562C59.0625 35.5312 59.5625 35.9375 60 36.375C60.4375 36.7917 60.6562 37.1562 60.6562 37.4688C60.6562 37.5312 60.6458 37.6146 60.625 37.7188C60.6042 37.8021 60.5729 37.9167 60.5312 38.0625C60.3646 38.5833 60.1458 39.1979 59.875 39.9062C59.625 40.6146 59.3542 41.3542 59.0625 42.125C58.7708 42.875 58.4792 43.6354 58.1875 44.4062C57.8958 45.1562 57.6354 45.8646 57.4062 46.5312C57.1771 47.1979 56.9896 47.7812 56.8438 48.2812C56.6979 48.7812 56.625 49.1458 56.625 49.375C56.625 49.5 56.6875 49.5625 56.8125 49.5625C57.0417 49.5625 57.3854 49.4271 57.8438 49.1562C58.3021 48.8854 58.8229 48.5312 59.4062 48.0938C60.0104 47.6562 60.6354 47.1771 61.2812 46.6562C61.9271 46.1354 62.5417 45.625 63.125 45.125C63.7292 44.6042 64.2708 44.1354 64.75 43.7188C65.2292 43.3021 65.5938 42.9896 65.8438 42.7812C66.0312 42.9688 66.25 43.2083 66.5 43.5C66.7708 43.7917 67.0208 44.0625 67.25 44.3125C66.7917 44.7708 66.2188 45.3333 65.5312 46C64.8438 46.6458 64.0938 47.3125 63.2812 48C62.4896 48.6875 61.6562 49.375 60.7812 50.0625C59.9271 50.75 59.0938 51.3646 58.2812 51.9062C57.4688 52.4479 56.7083 52.8854 56 53.2188C55.2917 53.5521 54.6875 53.7188 54.1875 53.7188ZM66.5625 24.2188C66.5417 24.3021 66.4583 24.5104 66.3125 24.8438C66.1875 25.1562 66.0312 25.5312 65.8438 25.9688C65.6562 26.3854 65.4375 26.8333 65.1875 27.3125C64.9583 27.7708 64.7292 28.1979 64.5 28.5938C64.2708 28.9896 64.0521 29.3229 63.8438 29.5938C63.6354 29.8438 63.4688 29.9688 63.3438 29.9688C62.9688 29.9479 62.5104 29.8333 61.9688 29.625C61.4479 29.4167 60.9375 29.1875 60.4375 28.9375C59.9583 28.6667 59.5417 28.4062 59.1875 28.1562C58.8542 27.9062 58.6875 27.7292 58.6875 27.625C58.6875 27.1875 58.8125 26.625 59.0625 25.9375C59.3125 25.2292 59.6042 24.5521 59.9375 23.9062C60.2708 23.2396 60.6042 22.6667 60.9375 22.1875C61.2917 21.7083 61.5625 21.4688 61.75 21.4688C62.125 21.4688 62.5833 21.5938 63.125 21.8438C63.6667 22.0729 64.1875 22.3438 64.6875 22.6562C65.2083 22.9688 65.6458 23.2812 66 23.5938C66.375 23.8854 66.5625 24.0938 66.5625 24.2188ZM62.25 53.9688C63.3333 52.1146 64.4792 50.0104 65.6875 47.6562C66.8958 45.2812 68.125 42.7396 69.375 40.0312C70.625 37.3021 71.875 34.4271 73.125 31.4062C74.375 28.3854 75.5833 25.2917 76.75 22.125C77.9167 18.9375 79.0208 15.6979 80.0625 12.4062C81.1042 9.11458 82.0417 5.84375 82.875 2.59375C83.4792 3.17708 84.1042 3.76042 84.75 4.34375C85.4167 4.90625 86.0625 5.46875 86.6875 6.03125C87.3125 6.57292 87.8958 7.11458 88.4375 7.65625C89 8.17708 89.4688 8.66667 89.8438 9.125C89.0729 11.375 88.1771 13.75 87.1562 16.25C86.1354 18.7292 85.0521 21.2604 83.9062 23.8438C82.7604 26.4062 81.5729 28.9583 80.3438 31.5C79.1354 34.0417 77.9375 36.4792 76.75 38.8125C75.5833 41.1458 74.4688 43.3333 73.4062 45.375C72.3438 47.3958 71.3958 49.1771 70.5625 50.7188C71.8125 50.7188 73.2917 50.7292 75 50.75C76.7083 50.75 78.5625 50.7604 80.5625 50.7812C82.5625 50.8021 84.6667 50.8333 86.875 50.875C89.0833 50.9167 91.3125 50.9688 93.5625 51.0312C93.2292 51.4896 92.8438 51.9896 92.4062 52.5312C91.9688 53.0729 91.5 53.625 91 54.1875C90.5208 54.7708 90.0208 55.3333 89.5 55.875C89 56.4375 88.5 56.9583 88 57.4375C86.125 57.3333 84.3125 57.1979 82.5625 57.0312C80.8333 56.8646 79.1562 56.6667 77.5312 56.4375C75.9062 56.2292 74.3125 56.0104 72.75 55.7812C71.2083 55.5521 69.6771 55.3229 68.1562 55.0938C67.9271 55.5104 67.7396 55.8125 67.5938 56C67.4688 56.1875 67.4167 56.2604 67.4375 56.2188L62.25 53.9688ZM94.6875 53.9688C95.7708 52.1146 96.9167 50.0104 98.125 47.6562C99.3333 45.2812 100.562 42.7396 101.812 40.0312C103.062 37.3021 104.312 34.4271 105.562 31.4062C106.812 28.3854 108.021 25.2917 109.188 22.125C110.354 18.9375 111.458 15.6979 112.5 12.4062C113.542 9.11458 114.479 5.84375 115.312 2.59375C115.917 3.17708 116.542 3.76042 117.188 4.34375C117.854 4.90625 118.5 5.46875 119.125 6.03125C119.75 6.57292 120.333 7.11458 120.875 7.65625C121.438 8.17708 121.906 8.66667 122.281 9.125C121.51 11.375 120.615 13.75 119.594 16.25C118.573 18.7292 117.49 21.2604 116.344 23.8438C115.198 26.4062 114.01 28.9583 112.781 31.5C111.573 34.0417 110.375 36.4792 109.188 38.8125C108.021 41.1458 106.906 43.3333 105.844 45.375C104.781 47.3958 103.833 49.1771 103 50.7188C104.25 50.7188 105.729 50.7292 107.438 50.75C109.146 50.75 111 50.7604 113 50.7812C115 50.8021 117.104 50.8333 119.312 50.875C121.521 50.9167 123.75 50.9688 126 51.0312C125.667 51.4896 125.281 51.9896 124.844 52.5312C124.406 53.0729 123.938 53.625 123.438 54.1875C122.958 54.7708 122.458 55.3333 121.938 55.875C121.438 56.4375 120.938 56.9583 120.438 57.4375C118.562 57.3333 116.75 57.1979 115 57.0312C113.271 56.8646 111.594 56.6667 109.969 56.4375C108.344 56.2292 106.75 56.0104 105.188 55.7812C103.646 55.5521 102.115 55.3229 100.594 55.0938C100.365 55.5104 100.177 55.8125 100.031 56C99.9062 56.1875 99.8542 56.2604 99.875 56.2188L94.6875 53.9688ZM132.438 53.7188C132.125 53.7188 131.729 53.6042 131.25 53.375C130.771 53.1667 130.312 52.8958 129.875 52.5625C129.438 52.25 129.062 51.8958 128.75 51.5C128.438 51.1042 128.281 50.7188 128.281 50.3438C128.49 49.4271 128.771 48.375 129.125 47.1875C129.479 46 129.865 44.7917 130.281 43.5625C130.677 42.3333 131.104 41.1354 131.562 39.9688C132 38.7812 132.396 37.7292 132.75 36.8125C133.125 35.8958 133.448 35.1562 133.719 34.5938C133.99 34.0312 134.167 33.75 134.25 33.75C134.375 33.75 134.688 33.8854 135.188 34.1562C135.688 34.4271 136.208 34.7604 136.75 35.1562C137.312 35.5312 137.812 35.9375 138.25 36.375C138.688 36.7917 138.906 37.1562 138.906 37.4688C138.906 37.5312 138.896 37.6146 138.875 37.7188C138.854 37.8021 138.823 37.9167 138.781 38.0625C138.615 38.5833 138.396 39.1979 138.125 39.9062C137.875 40.6146 137.604 41.3542 137.312 42.125C137.021 42.875 136.729 43.6354 136.438 44.4062C136.146 45.1562 135.885 45.8646 135.656 46.5312C135.427 47.1979 135.24 47.7812 135.094 48.2812C134.948 48.7812 134.875 49.1458 134.875 49.375C134.875 49.5 134.938 49.5625 135.062 49.5625C135.292 49.5625 135.635 49.4271 136.094 49.1562C136.552 48.8854 137.073 48.5312 137.656 48.0938C138.26 47.6562 138.885 47.1771 139.531 46.6562C140.177 46.1354 140.792 45.625 141.375 45.125C141.979 44.6042 142.521 44.1354 143 43.7188C143.479 43.3021 143.844 42.9896 144.094 42.7812C144.281 42.9688 144.5 43.2083 144.75 43.5C145.021 43.7917 145.271 44.0625 145.5 44.3125C145.042 44.7708 144.469 45.3333 143.781 46C143.094 46.6458 142.344 47.3125 141.531 48C140.74 48.6875 139.906 49.375 139.031 50.0625C138.177 50.75 137.344 51.3646 136.531 51.9062C135.719 52.4479 134.958 52.8854 134.25 53.2188C133.542 53.5521 132.938 53.7188 132.438 53.7188ZM144.812 24.2188C144.792 24.3021 144.708 24.5104 144.562 24.8438C144.438 25.1562 144.281 25.5312 144.094 25.9688C143.906 26.3854 143.688 26.8333 143.438 27.3125C143.208 27.7708 142.979 28.1979 142.75 28.5938C142.521 28.9896 142.302 29.3229 142.094 29.5938C141.885 29.8438 141.719 29.9688 141.594 29.9688C141.219 29.9479 140.76 29.8333 140.219 29.625C139.698 29.4167 139.188 29.1875 138.688 28.9375C138.208 28.6667 137.792 28.4062 137.438 28.1562C137.104 27.9062 136.938 27.7292 136.938 27.625C136.938 27.1875 137.062 26.625 137.312 25.9375C137.562 25.2292 137.854 24.5521 138.188 23.9062C138.521 23.2396 138.854 22.6667 139.188 22.1875C139.542 21.7083 139.812 21.4688 140 21.4688C140.375 21.4688 140.833 21.5938 141.375 21.8438C141.917 22.0729 142.438 22.3438 142.938 22.6562C143.458 22.9688 143.896 23.2812 144.25 23.5938C144.625 23.8854 144.812 24.0938 144.812 24.2188ZM169.688 44.3125C167.896 46.1458 166.094 47.8333 164.281 49.375C162.49 50.8958 160.708 52.3229 158.938 53.6562C158.604 54.6146 158.24 55.5833 157.844 56.5625C157.469 57.5625 157.073 58.5625 156.656 59.5625C156.052 60.9375 155.344 62.25 154.531 63.5C153.74 64.7708 152.896 65.9375 152 67C151.104 68.0833 150.188 69.0521 149.25 69.9062C148.312 70.7812 147.406 71.5208 146.531 72.125C145.677 72.7292 144.885 73.1979 144.156 73.5312C143.406 73.8646 142.771 74.0312 142.25 74.0312C141.896 74.0312 141.479 73.875 141 73.5625C140.521 73.25 140.073 72.8542 139.656 72.375C139.219 71.9167 138.854 71.4062 138.562 70.8438C138.25 70.3021 138.094 69.7812 138.094 69.2812C138.094 68.1979 138.469 67.1354 139.219 66.0938C139.948 65.0521 140.969 63.9792 142.281 62.875C143.573 61.7708 145.094 60.6042 146.844 59.375C148.594 58.1667 150.49 56.8542 152.531 55.4375C152.99 54.25 153.5 52.8438 154.062 51.2188C154.646 49.5729 155.333 47.5521 156.125 45.1562C155.375 46.1979 154.5 47.2292 153.5 48.25C152.5 49.25 151.469 50.1458 150.406 50.9375C149.344 51.7292 148.281 52.3646 147.219 52.8438C146.177 53.3438 145.219 53.5938 144.344 53.5938C144.115 53.5938 143.823 53.4792 143.469 53.25C143.094 53.0417 142.729 52.7604 142.375 52.4062C142 52.0521 141.688 51.6354 141.438 51.1562C141.167 50.6771 141.031 50.1667 141.031 49.625C141.031 48.9375 141.198 48.1146 141.531 47.1562C141.865 46.1771 142.354 45.1458 143 44.0625C143.625 42.9792 144.385 41.875 145.281 40.75C146.198 39.625 147.219 38.5729 148.344 37.5938C149.49 36.5938 150.729 35.7083 152.062 34.9375C153.417 34.1458 154.854 33.5417 156.375 33.125C156.604 33.125 156.927 33.2188 157.344 33.4062C157.76 33.5729 158.167 33.7708 158.562 34C158.979 34.2083 159.333 34.4167 159.625 34.625C159.938 34.8333 160.094 34.9688 160.094 35.0312C160.094 35.0729 160.062 35.125 160 35.1875C159.958 35.2083 159.927 35.2188 159.906 35.2188C159.427 35.5104 158.812 35.9167 158.062 36.4375C157.312 36.9583 156.521 37.5521 155.688 38.2188C154.854 38.8646 154.021 39.5625 153.188 40.3125C152.354 41.0625 151.594 41.8125 150.906 42.5625C150.24 43.2917 149.698 44 149.281 44.6875C148.865 45.3542 148.656 45.9583 148.656 46.5C148.656 46.6875 148.698 46.8542 148.781 47C148.885 47.125 149.031 47.1875 149.219 47.1875C149.74 47.1875 150.323 47.0104 150.969 46.6562C151.635 46.2812 152.312 45.8021 153 45.2188C153.688 44.6354 154.375 43.9896 155.062 43.2812C155.75 42.5521 156.396 41.8438 157 41.1562C157.625 40.4479 158.177 39.7917 158.656 39.1875C159.135 38.5833 159.51 38.0938 159.781 37.7188C159.823 37.6771 159.854 37.6354 159.875 37.5938C159.917 37.5521 159.969 37.5104 160.031 37.4688C160.198 37.5104 160.417 37.7188 160.688 38.0938C160.979 38.4688 161.26 38.9062 161.531 39.4062C161.802 39.8854 162.031 40.3646 162.219 40.8438C162.427 41.3229 162.531 41.6667 162.531 41.875V41.9375C162.531 41.9583 162.51 42.0312 162.469 42.1562C162.24 42.8854 161.948 43.9062 161.594 45.2188C161.24 46.5312 160.792 48.0417 160.25 49.75C161.583 48.6875 162.917 47.5729 164.25 46.4062C165.604 45.2396 166.948 43.9896 168.281 42.6562L169.688 44.3125ZM141.781 69.8438C142.198 69.8438 142.802 69.5208 143.594 68.875C144.365 68.25 145.188 67.4375 146.062 66.4375C146.938 65.4583 147.792 64.3646 148.625 63.1562C149.479 61.9688 150.188 60.8125 150.75 59.6875C149.396 60.6667 148.156 61.5833 147.031 62.4375C145.906 63.3125 144.948 64.1562 144.156 64.9688C143.344 65.7812 142.719 66.5625 142.281 67.3125C141.823 68.0833 141.594 68.8438 141.594 69.5938C141.594 69.7604 141.656 69.8438 141.781 69.8438ZM182.25 39.0625C181.979 39.875 181.635 40.8021 181.219 41.8438C180.823 42.8854 180.438 43.9062 180.062 44.9062C179.688 45.9062 179.365 46.8125 179.094 47.625C178.844 48.4375 178.719 49.0208 178.719 49.375C178.719 49.5 178.781 49.5625 178.906 49.5625C179.135 49.5625 179.479 49.4271 179.938 49.1562C180.396 48.8854 180.917 48.5312 181.5 48.0938C182.104 47.6562 182.729 47.1771 183.375 46.6562C184.021 46.1354 184.635 45.625 185.219 45.125C185.823 44.6042 186.365 44.1354 186.844 43.7188C187.323 43.3021 187.688 42.9896 187.938 42.7812C188.125 42.9688 188.344 43.2083 188.594 43.5C188.865 43.7917 189.115 44.0625 189.344 44.3125C188.885 44.7708 188.312 45.3333 187.625 46C186.938 46.6458 186.188 47.3125 185.375 48C184.583 48.6875 183.75 49.375 182.875 50.0625C182.021 50.75 181.177 51.3646 180.344 51.9062C179.531 52.4479 178.771 52.8854 178.062 53.2188C177.354 53.5521 176.76 53.7188 176.281 53.7188C175.969 53.7188 175.573 53.6042 175.094 53.375C174.615 53.1667 174.156 52.8958 173.719 52.5625C173.281 52.25 172.906 51.8958 172.594 51.5C172.281 51.1042 172.125 50.7188 172.125 50.3438C172.438 48.9479 172.75 47.7292 173.062 46.6875C173.375 45.6458 173.667 44.7604 173.938 44.0312C174.208 43.2812 174.448 42.6771 174.656 42.2188C174.865 41.7604 175.021 41.4167 175.125 41.1875C174.875 41.0833 174.635 40.9688 174.406 40.8438C174.177 40.7188 173.948 40.5938 173.719 40.4688C173.385 40.8229 173.01 41.1979 172.594 41.5938C172.198 41.9896 171.792 42.3854 171.375 42.7812C170.958 43.1771 170.542 43.5625 170.125 43.9375C169.708 44.3125 169.333 44.6562 169 44.9688L167.5 43.4375C168.042 42.9167 168.698 42.2917 169.469 41.5625C170.219 40.8125 170.958 40.0625 171.688 39.3125C171.167 39 170.698 38.7083 170.281 38.4375C169.865 38.1458 169.51 37.8854 169.219 37.6562C168.865 37.4062 168.552 37.1771 168.281 36.9688C168.156 36.9062 168.094 36.7708 168.094 36.5625C168.094 36.3333 168.188 36.0104 168.375 35.5938C168.542 35.1562 168.76 34.6979 169.031 34.2188C169.302 33.7188 169.594 33.2188 169.906 32.7188C170.219 32.1979 170.521 31.7292 170.812 31.3125C171.104 30.8958 171.354 30.5625 171.562 30.3125C171.792 30.0417 171.938 29.9062 172 29.9062C172.042 29.9062 172.177 29.9583 172.406 30.0625C172.656 30.1667 172.917 30.2917 173.188 30.4375C173.458 30.5625 173.708 30.7083 173.938 30.875C174.167 31.0417 174.312 31.1875 174.375 31.3125C174.396 31.4167 174.417 31.6354 174.438 31.9688C174.458 32.3021 174.479 32.7083 174.5 33.1875C175.312 33.6042 176.146 34.0833 177 34.625C177.854 35.1458 178.635 35.6458 179.344 36.125C180.177 36.6667 180.969 37.2188 181.719 37.7812C181.99 37.9479 182.156 38.1562 182.219 38.4062C182.302 38.6562 182.312 38.875 182.25 39.0625ZM205.5 49.25C205.5 49.375 205.562 49.4375 205.688 49.4375C205.875 49.4375 206.188 49.3021 206.625 49.0312C207.062 48.7604 207.562 48.4167 208.125 48C208.688 47.5833 209.281 47.1146 209.906 46.5938C210.552 46.0729 211.167 45.5625 211.75 45.0625C212.333 44.5625 212.854 44.1042 213.312 43.6875C213.792 43.2708 214.156 42.9479 214.406 42.7188C214.594 42.9062 214.823 43.1562 215.094 43.4688C215.385 43.7812 215.646 44.0625 215.875 44.3125C215.375 44.7708 214.771 45.3333 214.062 46C213.375 46.6458 212.625 47.3229 211.812 48.0312C211.021 48.7396 210.198 49.4479 209.344 50.1562C208.49 50.8438 207.656 51.4583 206.844 52C206.031 52.5417 205.26 52.9792 204.531 53.3125C203.802 53.6667 203.167 53.8438 202.625 53.8438C202.25 53.8438 201.833 53.7708 201.375 53.625C200.938 53.4792 200.531 53.2708 200.156 53C199.781 52.75 199.469 52.4479 199.219 52.0938C198.969 51.7396 198.844 51.3438 198.844 50.9062C198.844 50.7396 198.833 50.5417 198.812 50.3125C198.812 50.0625 198.833 49.75 198.875 49.375C198.917 48.9792 199 48.5104 199.125 47.9688C199.25 47.4062 199.438 46.7188 199.688 45.9062C199 46.6354 198.188 47.3958 197.25 48.1875C196.333 48.9792 195.365 49.7292 194.344 50.4375C193.323 51.1458 192.292 51.7812 191.25 52.3438C190.229 52.9271 189.281 53.3646 188.406 53.6562C188.302 53.6979 188.219 53.7188 188.156 53.7188C188.094 53.7188 188.031 53.7188 187.969 53.7188C187.76 53.7188 187.49 53.6146 187.156 53.4062C186.802 53.1979 186.458 52.9167 186.125 52.5625C185.792 52.2292 185.51 51.8438 185.281 51.4062C185.031 50.9688 184.906 50.5312 184.906 50.0938C184.906 49.9688 184.969 49.5521 185.094 48.8438C185.219 48.1354 185.521 47.2396 186 46.1562C186.458 45.0521 187.146 43.8229 188.062 42.4688C188.979 41.0938 190.229 39.6875 191.812 38.25C192.625 37.5208 193.5 36.8333 194.438 36.1875C195.229 35.6458 196.135 35.0938 197.156 34.5312C198.177 33.9688 199.25 33.5208 200.375 33.1875C200.417 33.1875 200.448 33.1771 200.469 33.1562C200.51 33.1354 200.562 33.1458 200.625 33.1875C200.875 33.2708 201.167 33.4062 201.5 33.5938C201.854 33.7604 202.198 33.9479 202.531 34.1562C202.885 34.3438 203.188 34.5417 203.438 34.75C203.708 34.9375 203.885 35.0938 203.969 35.2188C203.99 35.2604 203.99 35.2917 203.969 35.3125L203.906 35.375C202.969 35.875 202.083 36.4375 201.25 37.0625C200.417 37.6667 199.677 38.2396 199.031 38.7812C198.281 39.4271 197.583 40.0625 196.938 40.6875C195.417 42.1875 194.365 43.4896 193.781 44.5938C193.198 45.6771 192.906 46.4583 192.906 46.9375C192.906 47.2917 193.052 47.4688 193.344 47.4688C193.635 47.4688 194 47.3542 194.438 47.125C194.896 46.875 195.406 46.5521 195.969 46.1562C196.531 45.7396 197.146 45.2604 197.812 44.7188C198.5 44.1562 199.208 43.5729 199.938 42.9688C200.583 42.4479 201.208 41.8854 201.812 41.2812C202.333 40.7812 202.875 40.2083 203.438 39.5625C204 38.9167 204.479 38.2604 204.875 37.5938C204.875 37.5729 204.885 37.5521 204.906 37.5312C204.927 37.5104 204.958 37.5104 205 37.5312C205.229 37.6979 205.49 37.9792 205.781 38.375C206.073 38.75 206.344 39.1667 206.594 39.625C206.844 40.0833 207.052 40.5312 207.219 40.9688C207.406 41.3854 207.5 41.7083 207.5 41.9375C207.021 42.9167 206.646 43.8125 206.375 44.625C206.125 45.4167 205.927 46.1146 205.781 46.7188C205.656 47.3229 205.573 47.8438 205.531 48.2812C205.51 48.6979 205.5 49.0208 205.5 49.25ZM222.781 36.9062C222.531 37.5521 222.281 38.2188 222.031 38.9062C221.781 39.5938 221.542 40.2917 221.312 41C222.625 39.4375 223.708 38.1875 224.562 37.25C225.438 36.3125 226.156 35.5833 226.719 35.0625C227.302 34.5417 227.781 34.1771 228.156 33.9688C228.531 33.7604 228.875 33.6042 229.188 33.5C229.375 33.5 229.688 33.6042 230.125 33.8125C230.583 34.0208 231.062 34.2812 231.562 34.5938C232.083 34.8854 232.573 35.1979 233.031 35.5312C233.49 35.8438 233.812 36.1042 234 36.3125C234.167 36.4792 234.188 36.7188 234.062 37.0312C233.812 37.6979 233.562 38.375 233.312 39.0625C233.083 39.7292 232.854 40.4167 232.625 41.125C234.021 39.5208 235.188 38.2396 236.125 37.2812C237.062 36.3021 237.823 35.5521 238.406 35.0312C239.01 34.5104 239.479 34.1667 239.812 34C240.146 33.8333 240.406 33.75 240.594 33.75C240.865 33.75 241.271 33.8854 241.812 34.1562C242.354 34.4271 242.896 34.7604 243.438 35.1562C244 35.5521 244.479 35.9583 244.875 36.375C245.292 36.7917 245.5 37.1562 245.5 37.4688C245.5 37.5312 245.49 37.6146 245.469 37.7188C245.448 37.8021 245.417 37.9167 245.375 38.0625C245.208 38.5833 244.99 39.1979 244.719 39.9062C244.469 40.6146 244.198 41.3542 243.906 42.125C243.615 42.875 243.323 43.6354 243.031 44.4062C242.74 45.1562 242.479 45.8646 242.25 46.5312C242.021 47.1979 241.833 47.7812 241.688 48.2812C241.542 48.7812 241.469 49.1458 241.469 49.375C241.469 49.5 241.531 49.5625 241.656 49.5625C241.885 49.5625 242.229 49.4271 242.688 49.1562C243.146 48.8854 243.667 48.5312 244.25 48.0938C244.854 47.6562 245.479 47.1771 246.125 46.6562C246.771 46.1354 247.385 45.625 247.969 45.125C248.573 44.6042 249.115 44.1354 249.594 43.7188C250.073 43.3021 250.438 42.9896 250.688 42.7812C250.875 42.9688 251.094 43.2083 251.344 43.5C251.615 43.7917 251.865 44.0625 252.094 44.3125C251.635 44.7708 251.062 45.3333 250.375 46C249.688 46.6458 248.938 47.3125 248.125 48C247.333 48.6875 246.5 49.375 245.625 50.0625C244.771 50.75 243.938 51.3646 243.125 51.9062C242.312 52.4479 241.552 52.8854 240.844 53.2188C240.135 53.5521 239.531 53.7188 239.031 53.7188C238.719 53.7188 238.323 53.6042 237.844 53.375C237.365 53.1667 236.906 52.8958 236.469 52.5625C236.031 52.25 235.656 51.8958 235.344 51.5C235.031 51.1042 234.875 50.7188 234.875 50.3438C235.062 49.4896 235.312 48.5208 235.625 47.4375C235.938 46.3542 236.281 45.25 236.656 44.125C237.031 42.9792 237.417 41.8542 237.812 40.75C238.229 39.6458 238.625 38.625 239 37.6875C238.583 38.1875 238.031 38.7917 237.344 39.5C236.656 40.2083 235.875 41.1458 235 42.3125C234.125 43.4583 233.188 44.8854 232.188 46.5938C231.188 48.3021 230.188 50.3854 229.188 52.8438C229.062 53.2604 228.76 53.4688 228.281 53.4688C228.031 53.4688 227.719 53.4167 227.344 53.3125C226.99 53.2292 226.604 53.0833 226.188 52.875C225.792 52.6875 225.375 52.4479 224.938 52.1562C224.521 51.8646 224.125 51.5104 223.75 51.0938C223.75 50.9479 223.823 50.5104 223.969 49.7812C224.135 49.0312 224.365 48.0833 224.656 46.9375C224.969 45.7917 225.333 44.5104 225.75 43.0938C226.167 41.6771 226.635 40.2188 227.156 38.7188C226.656 39.2604 226.031 39.9583 225.281 40.8125C224.531 41.6458 223.729 42.6667 222.875 43.875C222.021 45.0625 221.146 46.4479 220.25 48.0312C219.354 49.6146 218.51 51.4062 217.719 53.4062C217.594 53.8438 217.302 54.0625 216.844 54.0625C216.49 54.0625 216.094 53.9583 215.656 53.75C215.198 53.5625 214.74 53.3021 214.281 52.9688C213.802 52.6562 213.333 52.3021 212.875 51.9062C212.396 51.5104 211.969 51.1146 211.594 50.7188C211.594 50.5938 211.656 50.2396 211.781 49.6562C211.885 49.0729 212.042 48.3438 212.25 47.4688C212.458 46.5729 212.719 45.5625 213.031 44.4375C213.323 43.2917 213.667 42.0938 214.062 40.8438C214.458 39.5938 214.896 38.3229 215.375 37.0312C215.854 35.7188 216.365 34.4583 216.906 33.25C217.781 33.6667 218.75 34.1771 219.812 34.7812C220.896 35.3854 221.885 36.0938 222.781 36.9062Z" fill="#FF00E5"/>
                        </svg>

                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-1">
                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="ml-12">
                                <div class="mt-1 text-gray-600 dark:text-gray-400 text-sm">
                                    MiLLigram adalah sebuah website sosial media yang memungkinkan pengguna untuk membagikan gambar ke jejaring sosial.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                </div>
            </div>
        </div>
    </body>
</html>
