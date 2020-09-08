<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAirports" aria-expanded="true"
        aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Airports</span>
    </a>
    <div id="collapseAirports" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Airports:</h6>
            <a class="collapse-item" href="{{route('airports.create')}}">Create a flight</a>
            <a class="collapse-item" href="{{route('airports.index')}}">View all flights</a>
        </div>
    </div>
</li>