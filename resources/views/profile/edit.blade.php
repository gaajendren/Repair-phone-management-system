<!DOCTYPE html>
<html lang="en">

@include('partials/header')

<body>
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>

   @include('partials/top_navbar')

    <div class="d-flex mt-4 align-items-center justify-content-center">
        <div class="w-75 card m-4">
            <div class="w-100 mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-5 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-5 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

               
            </div>
        </div>
    </div>
  @include('partials/footer')
