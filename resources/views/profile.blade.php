@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="outerContainer w-full flex">
        @include('components.sidebar')
        <div id="main-content" class="ml-[414px] w-[72%]">
            @include('partials.profile_content')
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        let shouldLoadPreference = @json($loadPreference);

        $(document).ready(function() {
            if (shouldLoadPreference) {
                $('#load-preference').addClass('active-bar');
                $('#load-profile').removeClass('active-bar');
                $('#load-history').removeClass('active-bar');

                loadContent('{{ route('preference.content') }}');
            } else {
                $('#load-profile').addClass('active-bar');
                loadContent('{{ route('profile.content') }}');
            }
        });

        function loadContent(url) {
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    $('#main-content').html(response);
                },
                error: function(xhr) {
                    alert('Gagal memuat halaman.');
                }
            });
        }

        $('#load-profile').on('click', function() {
            if (!$(this).hasClass('active-bar')) {
                $('#load-preference').removeClass('active-bar');
                $('#load-profile').addClass('active-bar');
                $('#load-history').removeClass('active-bar');
            }
            loadContent('{{ route('profile.content') }}');
        });

        $('#load-preference').on('click', function() {
            if (!$(this).hasClass('active-bar')) {
                $('#load-preference').addClass('active-bar');
                $('#load-profile').removeClass('active-bar');
                $('#load-history').removeClass('active-bar');
            }

            loadContent('{{ route('preference.content') }}');
        });

        $('#load-history').on('click', function() {
            if (!$(this).hasClass('active-bar')) {
                $('#load-preference').removeClass('active-bar');
                $('#load-profile').removeClass('active-bar');
                $('#load-history').addClass('active-bar');
            }

            loadContent('{{ route('history.content') }}');
        });
    </script>



@endsection
