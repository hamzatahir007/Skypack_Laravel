 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">SP Admin</div>
         <!-- <div class="sidebar-brand-text mx-3">SP Admin <sup>2</sup></div> -->
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="{{ route('dashboard') }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Task
     </div>

     <!-- Clients -->
     <li class="nav-item" id="menuClients">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClients"
             aria-expanded="true" aria-controls="collapseClients">
             <i class="fas fa-fw fa-cog"></i>
             <span>Clients</span>
         </a>

         <div id="collapseClients" class="collapse" aria-labelledby="headingClients" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Client Tasks:</h6>
                 <a class="collapse-item" href="{{ route('clients.create') }}" id="menuAddClient">Add Client</a>
                 <a class="collapse-item" href="{{ route('clients.index') }}" id="menuListClients">List Clients</a>
             </div>
         </div>
     </li>


     <!-- Traveler -->
     <li class="nav-item" id="menuTravelers">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTravelers"
             aria-expanded="true" aria-controls="collapseTravelers">
             <i class="fas fa-fw fa-cog"></i>
             <span>Traveler</span>
         </a>

         <div id="collapseTravelers" class="collapse" aria-labelledby="headingTravelers"
             data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Traveler Tasks:</h6>
                 <a class="collapse-item" href="{{ route('travelers.create') }}" id="menuAddTraveler">Add Traveler</a>
                 <a class="collapse-item" href="{{ route('travelers.index') }}" id="menuListTravelers">List
                     Travelers</a>
             </div>
         </div>
     </li>

     <!-- Flights -->
     <li class="nav-item" id="menuFlights">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFlights"
             aria-expanded="true" aria-controls="collapseFlights">
             <i class="fas fa-fw fa-cog"></i>
             <span>Flights</span>
         </a>

         <div id="collapseFlights" class="collapse" aria-labelledby="headingFlights" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Flight Tasks:</h6>
                 <a class="collapse-item" href="{{ route('travel_flights.create') }}" id="menuAddFlight">Add Flight</a>
                 <a class="collapse-item" href="{{ route('travel_flights.index') }}" id="menuListFlights">List
                     Flights</a>
             </div>
         </div>
     </li>


     <!-- Flights -->
     <li class="nav-item" id="menuInquiries">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInquiries"
             aria-expanded="true" aria-controls="collapseInquiries">
             <i class="fas fa-fw fa-cog"></i>
             <span>Inquiries</span>
         </a>

         <div id="collapseInquiries" class="collapse" aria-labelledby="headingInquiries"
             data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Inquiry Tasks:</h6>
                 <a class="collapse-item" href="{{ route('inquiries.create') }}" id="menuAddInquiry">Add Inquiry</a>
                 <a class="collapse-item" href="{{ route('inquiries.index') }}" id="menuListInquiries">List
                     Inquiries</a>
             </div>
         </div>
     </li>



     <!-- Flights -->
     <li class="nav-item" id="menuInventory">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventory"
             aria-expanded="true" aria-controls="collapseInventory">
             <i class="fas fa-fw fa-cog"></i>
             <span>Inventory</span>
         </a>

         <div id="collapseInventory" class="collapse" aria-labelledby="headingInventory"
             data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Inventory Tasks:</h6>
                 <a class="collapse-item" href="{{ route('inventory.create') }}" id="menuAddInventory">Add
                     Inventory</a>
                 <a class="collapse-item" href="{{ route('inventory.index') }}" id="menuListInventory">List
                     Inventory</a>
             </div>
         </div>


     </li>

     <li class="nav-item" id="menuRequest">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRequest"
             aria-expanded="true" aria-controls="collapseRequest">
             <i class="fas fa-fw fa-cog"></i>
             <span>Withdraw Requests</span>
         </a>
         <div id="collapseRequest" class="collapse" aria-labelledby="headingRequest"
             data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Request Tasks:</h6>
                 {{-- <a class="collapse-item" href="{{ route('request.create') }}" id="menuAddRequest">Add Inventory</a> --}}
                 <a class="collapse-item" href="{{ route('withdrawRequest.index') }}" id="menuListRequest">List
                     Request</a>
             </div>
         </div>
     </li>


     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->


 <script>
     document.addEventListener('DOMContentLoaded', function() {
         const path = window.location.pathname;

         document.querySelectorAll('.nav-item, .collapse-item').forEach(el => el.classList.remove('active'));

         if (path === "{{ route('dashboard') }}") {
             document.getElementById('menuDashboard').classList.add('active');
         }
         if (path.includes('/clients/create')) {
             document.getElementById('menuClients').classList.add('active');
             document.getElementById('collapseClients').classList.add('show');
             document.getElementById('menuAddClient').classList.add('active');
         }
         if (path.includes('/clients') && !path.includes('/create')) {
             document.getElementById('menuClients').classList.add('active');
             document.getElementById('collapseClients').classList.add('show');
             document.getElementById('menuListClients').classList.add('active');
         }
         if (path.includes('/travelers/create')) {
             document.getElementById('menuTravelers').classList.add('active');
             document.getElementById('collapseTravelers').classList.add('show');
             document.getElementById('menuAddTraveler').classList.add('active');
         }
         if (path.includes('/travelers') && !path.includes('/create')) {
             document.getElementById('menuTravelers').classList.add('active');
             document.getElementById('collapseTravelers').classList.add('show');
             document.getElementById('menuListTravelers').classList.add('active');
         }
         if (path.includes('/travel_flights/create')) {
             document.getElementById('menuFlights').classList.add('active');
             document.getElementById('collapseFlights').classList.add('show');
             document.getElementById('menuAddFlight').classList.add('active');
         }
         if (path.includes('/travel_flights') && !path.includes('/create')) {
             document.getElementById('menuFlights').classList.add('active');
             document.getElementById('collapseFlights').classList.add('show');
             document.getElementById('menuListFlights').classList.add('active');
         }
         if (path.includes('/inquiries/create')) {
             document.getElementById('menuInquiries').classList.add('active');
             document.getElementById('collapseInquiries').classList.add('show');
             document.getElementById('menuAddInquiry').classList.add('active');
         }
         if (path.includes('/inquiries') && !path.includes('/create')) {
             document.getElementById('menuInquiries').classList.add('active');
             document.getElementById('collapseInquiries').classList.add('show');
             document.getElementById('menuListInquiries').classList.add('active');
         }
         if (path.includes('/inventory/create')) {
             document.getElementById('menuInventory').classList.add('active');
             document.getElementById('collapseInventory').classList.add('show');
             document.getElementById('menuAddInventory').classList.add('active');
         }
         if (path.includes('/inventory') && !path.includes('/create')) {
             document.getElementById('menuInventory').classList.add('active');
             document.getElementById('collapseInventory').classList.add('show');
             document.getElementById('menuListInventory').classList.add('active');
         }

         if (path.includes('/withdrawRequest') && !path.includes('/create')) {
             document.getElementById('menuRequest').classList.add('active');
             document.getElementById('collapseRequest').classList.add('show');
             document.getElementById('menuListRequest').classList.add('active');
         }
     });
 </script>
