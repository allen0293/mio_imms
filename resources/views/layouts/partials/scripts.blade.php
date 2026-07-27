<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.archive-btn').forEach(button => {
        button.addEventListener('click', function () {
            const form = document.getElementById(this.dataset.form);

            if (!form) {
                console.error('Archive form not found:', this.dataset.form);
                return;
            }

            const label = this.dataset.label || 'Record';

            Swal.fire({
                title: `Archive ${label}?`,
                html: `<strong>${this.dataset.name}</strong><br><br>This record can be restored later.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Archive',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>