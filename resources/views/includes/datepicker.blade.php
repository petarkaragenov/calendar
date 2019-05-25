<script>
    $(".datepicker").flatpickr({
        enableTime: true,
        disable: [
            function(date) {
                return (date.getMonth() < new Date().getMonth() || date.getMonth() > new Date().getMonth() + 3)
            }
        ]
    });
</script>