document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("scroll-to-form").addEventListener("click", function(event) {
        event.preventDefault(); // Prevent any default behavior
        document.getElementById("appointment-form").scrollIntoView({
            behavior: "smooth",
            block: "start"
        });
    });
});