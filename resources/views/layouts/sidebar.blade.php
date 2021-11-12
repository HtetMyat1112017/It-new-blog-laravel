            <div class="col-12 col-lg-3 col-md-4 col-xl-2 vh-100 sidebar">
                <div class="d-flex justify-content-between align-items-center py-2 mt-3 nav-brand">
                   <div class="text-center">
                       <img src="{{asset('logos/logo.PNG')}}" class="w-50" alt="">
                   </div>

                </div>
                <hr>
                <div class="nav-menu">
                    <ul>
                        <li class="menu-item">
                            <a href="#" class="menu-item-link active">
                            <span>
                                <i class="feather-home"></i>
                                Dashboard
                            </span>
                            </a>
                        </li>
                        <li class="menu-spacer"></li>

                        <li class="menu-title">
                            <span>test Management</span>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-item-link">
                            <span>
                                <i class="feather-list"></i>
                                Test List
                            </span>
                                <span class="badge badge-pill bg-white shadow-sm text-primary p-1">12</span>
                            </a>
                        </li>
                        <li class="menu-spacer"></li>

                        <li class="menu-title">
                            <span>Article Management</span>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('category.create')}}" class="menu-item-link">
                            <span>
                                <i class="feather-layers"></i>
                               Manage Category
                            </span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('Article.create')}}" class="menu-item-link">
                            <span>
                                <i class="feather-plus-circle"></i>
                              Create Article
                            </span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('Article.index')}}" class="menu-item-link">
                            <span>
                                <i class="feather-list"></i>
                              Article List
                            </span>
                            </a>
                        </li>

                        <li class="menu-spacer"></li>
                        <li class="menu-title">
                            <span>User Setting</span>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('profile.index')}}" class="menu-item-link">
                            <span>
                                <i class="feather-user"></i>
                              Profile
                            </span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('profile.changeName')}}" class="menu-item-link">
                            <span>
                              <i class="feather-arrow-up-circle"></i>
                              Update Name & Email
                            </span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('profile.changePassword')}}" class="menu-item-link">
                            <span>
                              <i class="feather-slack"></i>
                             Change Password
                            </span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('profile.changePhoto')}}" class="menu-item-link">
                            <span>
                              <i class="feather-image"></i>
                             Change Profile Photo
                            </span>
                            </a>
                        </li>
                        <li class="menu-spacer"></li>

                        <li class="menu-item bg-dark rounded">
                            <a class="menu-item-link text-white" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                <span>
                                <i class="feather-log-out"></i>
                               Log Out
                            </span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>


