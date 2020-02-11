
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
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Data Pengguna 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="?view=admin">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Admin & Superadmin
						</a>
					</li>
				</ul>
			</li>
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-6"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Management Informasi
				</a>
				<ul class="children collapse" id="sub-item-6">
					<li>
						<a class="" href="?view=konten">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Konten Beranda
						</a>
					</li>
					<li>
						<a class="" href="?view=kategori">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Kategori Konten
						</a>
					</li>
					<li>
						<a class="" href="?view=mode">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Mode Tampilan
						</a>
					</li>
					<li>
						<a class="" href="?view=verifikasi">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>  Status Tampilan
						</a>
					</li>
				</ul>
			</li>
			  
			<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>

		</ul>

	</div>