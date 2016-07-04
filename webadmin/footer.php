<div class="footer">
	<div class="container">
		<span class="copyright">Copyright &copy; <?php echo date('Y'); ?> Berita Kita </span>
	</div>
</div>
<div class="modal fade" id="modal_logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3><span class="fa fa-question-circle"></span>&nbsp;&nbsp;Anda Yakin Ingin Keluar?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">
                    <i class="fa fa-times"></i>&nbsp;&nbsp;Tidak
                </button>
                <a href="logout.php" class="btn btn-danger">
                    <i class="fa fa-check"></i>&nbsp;&nbsp;Ya
                </a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>