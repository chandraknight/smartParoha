	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.php">
				<img src="{{URL::asset('assets/vendors/images/deskapp-logo.png')}}" alt="">
			</a>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					{{--<li class="dropdown">--}}
                        <li>
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-home"></span><span class="mtext">Home</span>
						</a>
						{{--<ul class="submenu">
							<li><a href="index.php">Dashboard style 1</a></li>
							<li><a href="index2.php">Dashboard style 2</a></li>
						</ul>--}}
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-pencil"></span><span class="mtext">Person Data</span>
						</a>
						<ul class="submenu">
                            <li><a href="{{route('list-person')}}">List</a></li>
                            <li><a href="{{route('add-person')}}">Add New</a></li>

						</ul>
					</li>

				</ul>
			</div>
		</div>
	</div>
