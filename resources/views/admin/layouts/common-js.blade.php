<script>

    // Success Swal
    function sendSuccess(message) {
        Swal.fire({
            title: "Success!",
            text: message,
            icon: "success",
            confirmButtonClass: "btn btn-primary w-md mt-3",
            showCancelButton: false,
            showConfirmButton: true,
            timer: 3000,
        });
    }

    // Error Swal
    function sendError(message) {
        Swal.fire({
            title: "Error!",
            text: message,
            icon: "error",
            showCancelButton: false,
            showConfirmButton: true,
            timer: 4000,
        });
    }
    function actionError(xhr, message = "400 Bad Request") {
        if (xhr.status == 400) {
            sendError(message);

        } else if (xhr.status === 500) {
            sendError("500 Internal Server Error")
        }
    }

    function sendToast(text, className = 'success', gravity = 'top', position = 'center', duration = 3000, close = '', style = null) {
        Toastify({
            newWindow: !0,
            text: text,
            gravity: gravity,
            position: position,
            className: "bg-" + className,
            stopOnFocus: !0,
            offset: {x: 0, y: 0},
            duration: duration,
            close: "close" == close,
            style: "style" == style ? {background: "linear-gradient(to right, #0AB39C, #405189)"} : ""
        }).showToast()
    }

</script>
