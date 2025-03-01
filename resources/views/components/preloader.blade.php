<div id="preloader" class="fixed inset-0 flex items-center justify-center bg-white z-50 transition-opacity duration-300">
    <div class="w-12 h-12 border-4 border-blue-500 border-t-transparent rounded-full animate-spin"></div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(() => {
            document.getElementById("preloader").classList.add("opacity-0");
            setTimeout(() => {
                document.getElementById("preloader").style.display = "none";
            }, 300);
        }, 500); // Ensures the preloader is visible for a short moment before hiding
    });
</script>
