<!DOCTYPE html>

<head>
    <title>Tugas Uraian</title>
    <?php $this->load->view("templates/head.php"); ?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url('assets/jquery.countdown-2.2.0/jquery.countdown.js'); ?>"> </script>

</head>

<body>
    <div id="getting-started"></div>
    <script type="text/javascript">
        $("#getting-started")
            .countdown("2019/12/29", function(event) {
                $(this).text(
                    event.strftime('%D days %H:%M:%S')
                );
            });
    </script>
</body>

</html>