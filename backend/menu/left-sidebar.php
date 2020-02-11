
<style type="text/css">
	#nav li.active a {
		background-color: green;
	}
</style>
<script type="text/javascript">
	$(function(){
		$('#nav a[href~="' + location.href + '"]').parents('li').add
		Class('active');
	});
</script>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<form role="search">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search">
		</div>
	</form>
	<ul class="nav menu" id="nav">
		<li><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Beranda</a></li>
		<li><a href="?view=konten"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Informasi Artikel</a></li>
		<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>

	</ul>

	</div>