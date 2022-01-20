<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- jQuery (Cloudflare CDN) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css"
      integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g=="
      crossorigin="anonymous" referrerpolicy="no-referrer">
<!-- Bootstrap Bundle JS (Cloudflare CDN) -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.min.js"
        integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" media="screen" href="../main.css"/>

<link rel="shortcut icon" href="./images/icon.jpg" type="image/x-icon">

<script src="../libs/codemirror/lib/codemirror.js"></script>
<link rel="stylesheet" href="../libs/codemirror/lib/codemirror.css">
<script src="../libs/codemirror/mode/php/php.js"></script>
<script src="../libs/codemirror/mode/clike/clike.js"></script>


<div aria-live="polite" aria-atomic="true" style="position: relative; z-index: 9999">
    <div class="toast" style="position: fixed; top: 10px; right: 10px;" role="alert" data-delay="10000">
        <div class="toast-header">
            <strong class="mr-auto">Сообщение</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
        </div>
    </div>
</div>

<script>
    let message = '<?php echo $message;?>';
    $(document).ready(function () {
        if (message) {
            $('.toast-body').html(message);
            $('.toast').toast('show');
        }
    });
</script>