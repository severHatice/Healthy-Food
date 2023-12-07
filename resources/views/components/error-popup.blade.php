


@if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            title: 'There is an error!',
            icon: 'error',
            html: `
                <ul style="list-style-type: none; padding: 0; margin: 0;">
                    @foreach ($errors->all() as $error)
                        <li style="margin-bottom: 10px;">{{ $error }}</li>
                    @endforeach
                </ul>
            `,
            confirmButtonText: 'Ok',
            customClass: {
                popup: 'custom-popup',
                title: 'custom-title',
                content: 'custom-content',
                confirmButton: 'custom-confirm-button'
            },
            buttonsStyling: false
        });
    });
</script>
<style>
    .custom-popup {
        background-color: var(--bg-color);
        border-color: var(--icons-color);
    }

    .custom-title {
        color: var(--title-color);
    }

    .custom-content {
        color: var(--text-color);
    }

    .custom-confirm-button {
        background-color: var(--btn-color);
        color: var(--title-color);
        border: none;
    }

    .custom-confirm-button:hover {
        background-color: var(--icons-color);
    }

    .custom-content li {
        color: var(--text-color);
    }
</style>
@endif