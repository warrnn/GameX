<footer class="h-72 bg-primary">
    <div class="flex flex-col sm:flex-row h-full items-center mx-20">
        <img src="{{ asset('assets/logo/logo_light.png') }}" alt="GameX Logo" class="pt-10 sm:pt-0 h-44 sm:h-52 drop-shadow-xl" data-tilt data-tilt-max="60" data-tilt-scale="1.2">
        <a href="{{ route('admin.usersList') }}" class="mt-4 sm:ms-auto">
            <h3 class="text-strike hover:text-accent transition">© 2024, GameX, Inc.</h3>
        </a>
    </div>
</footer>

<!-- TiltJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>
<script src="https://unpkg.com/tilt.js@1.2.1/dest/tilt.jquery.min.js"></script>