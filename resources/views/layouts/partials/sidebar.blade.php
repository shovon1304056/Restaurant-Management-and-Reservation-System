<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('backend/img/sidebar-1.jpg')}}">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="{{route('welcome')}}" class="simple-text logo-normal">
          RMS
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="{{Request::is('admin/dashboard*') ? 'nav-item active' : ''}}">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard </p>
            </a>
          </li>
          <li class="{{Request::is('admin/slider*') ? 'nav-item active' : ''}}">
            <a class="nav-link" href="{{route('slider.index')}}">
              <i class="material-icons">add_photo_alternate</i>
              <p>Slider</p>
            </a>
          </li>
          <li class="{{Request::is('admin/category*') ? 'nav-item active' : ''}}">
            <a class="nav-link" href="{{route('category.index')}}">
              <i class="material-icons">content_paste</i>
              <p>Category</p>
            </a>
          </li>
          <li class="{{Request::is('admin/item*') ? "nav-item active" : ''}}">
            <a class="nav-link" href="{{route('item.index')}}">
              <i class="material-icons">library_books</i>
              <p>Items</p>
            </a>
          </li>
          <li class="{{Request::is('admin/reservation_admin*') ? "nav-item active" : ''}}">
            <a class="nav-link" href="{{route('reservation_admin.index')}}">
              <i class="material-icons">bubble_chart</i>
              <p>Reservation</p>
            </a>
          </li>
          <li class="{{Request::is('admin/contact_admin*') ? "nav-item active" : ''}}">
            <a class="nav-link" href="{{route('contact_admin.index')}}">
              <i class="material-icons">location_ons</i>
              <p>Contacts</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./notifications.html">
              <i class="material-icons">notifications</i>
              <p>Notifications</p>
            </a>
          </li>

        </ul>
      </div>
    </div>
